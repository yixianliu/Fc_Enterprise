<?php

/**
 * @abstract 用户控制器
 * @author   Yxl <zccem@163.com>
 */

namespace frontend\controllers;

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
        return $this->render('index');
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

        if ($model->load(Yii::$app->request->post())) {
            if (!$model->setPsw($password)) {
                Yii::$app->getSession()->setFlash('error', '原密码有误 !!');
            } else {
                return $this->redirect(['index']);
            }
        }

        return $this->render('setpassword', ['model' => $model]);
    }

}
