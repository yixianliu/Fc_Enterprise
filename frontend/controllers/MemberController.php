<?php

/**
 * @abstract 用户登录控制器
 * @author   Yxl <zccem@163.com>
 */

namespace frontend\controllers;


use Yii;
use yii\helpers\Json;
use yii\web\Controller;
use common\models\User;

class MemberController extends Controller
{

    public $layout = 'default';

    // 构造
    public function init()
    {

        parent::init();

        if (!file_exists(Yii::getAlias('@backend') . '/web/' . Yii::$app->params['RD_FILE'])) {
            exit('Null');
        }

        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/user/index']);
        }

        return;
    }

    /**
     * 登录
     *
     * @return string
     */
    public function actionLogin()
    {

        $model = new User();

        $model->scenario = 'login';

        if ($model->load(Yii::$app->request->post())) {

        }

        return $this->render('../center/login', ['model' => $model]);
    }

    /**
     * 注册
     */
    public function actionReg()
    {

        $model = new User();

        $model->scenario = 'reg';

        if (Yii::$app->request->isPost) {

            if (!$model->load(Yii::$app->request->post()) || !$model->validate()) {
                Yii::$app->getSession()->setFlash('error', $model->getErrors());
            }

            if (!($user = $model->userReg())) {
                Yii::$app->getSession()->setFlash('error', '注册失败,请检查 !!');
            }

            if (!Yii::$app->getUser()->login($model->getUser(), (3600 * 24 * 30))) {
                Yii::$app->getSession()->setFlash('error', '无法保存时间 !!');
            }

            if (!Yii::$app->user->isGuest) {
                return $this->redirect(['/user/index']);
            }
        }

        return $this->render('../center/reg', ['model' => $model]);
    }

    /**
     * 注销用户
     *
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->getSession()->destroy();
        return $this->goHome();
    }

    public function actionSend()
    {

        if (!Yii::$app->request->isAjax) {
            return Json::encode(['msg' => '提交方式有误 !!']);
        }

//        Yii::$app->smser->send('13660525467', rand(10000, 99999));

        return Json::encode(Yii::$app->smser->send('13660525467', rand(10000, 99999)));

//        return Json::encode(['status' => true]);
    }

}
