<?php

/**
 * @abstract 用户控制器
 * @author   Yxl <zccem@163.com>
 */

namespace frontend\controllers;

use common\models\Product;
use common\models\UserSupply;
use Yii;
use common\models\Job;
use common\models\User;

class UserController extends BaseController
{

    // 布局
    public $layout = 'user';

    public function init()
    {

        // 判断用户
        $this->isUser();

        return true;
    }

    /**
     * @abstract 用户中心
     */
    public function actionIndex()
    {

        // 初始化
        $result['product'] = Product::findAll(['is_audit' => 'On']);

        return $this->render('index', ['result' => $result]);
    }

    /**
     * 签到
     *
     * @return string
     */
    public function actionCheck()
    {
        return $this->render('check');
    }

    /**
     * 商户资料
     *
     * @return string
     */
    public function actionSupplier()
    {

        $model = UserSupply::findOne(['user_id' => Yii::$app->user->identity->user_id]);

        if (empty($model))
            $model = new UserSupply();

        $model->user_id = Yii::$app->user->identity->user_id;

        // 是否存在
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['user/index']);
        }

        return $this->render('supplier', ['model' => $model]);
    }

    /**
     * 用户资料
     *
     * @return string
     */
    public function actionInfo()
    {

        $model = User::findOne(['user_id' => Yii::$app->user->identity->user_id]);

        $model->scenario = 'info';

        if ($model->load(Yii::$app->request->post())) {

            if (!$model->save()) {
                Yii::$app->getSession()->setFlash('error', '修改资料有误 !!');
            } else {

                Yii::$app->getSession()->setFlash('success', '修改资料成功 !!');

                return $this->redirect(['info']);
            }
        }

        return $this->render('info', ['model' => $model]);
    }

    /**
     * 修改密码
     *
     * @return string
     */
    public function actionSetpassword()
    {

        $model = User::findOne(['user_id' => Yii::$app->user->identity->user_id]);

        $model->scenario = 'setpsw';

        $password = $model->password;
        $model->password = null;

        $data = Yii::$app->request->post();

        if ($model->load(Yii::$app->request->post())) {
            if (!$model->setPsw($data['User']['password'])) {
                Yii::$app->getSession()->setFlash('error', '原密码有误 !!');
            } else {
                return $this->redirect(['index']);
            }
        }

        return $this->render('setpassword', ['model' => $model]);
    }

}
