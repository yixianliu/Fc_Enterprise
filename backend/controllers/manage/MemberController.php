<?php

namespace backend\controllers\manage;

use Yii;
use yii\web\Controller;
use backend\models\LoginForm;
use common\models\Conf;

class MemberController extends Controller
{

    public $layout = false;

    public function actionLogin()
    {

        // 是否安装
        if (!file_exists(Yii::getAlias('@webroot') . '/' . Yii::$app->params['RD_FILE'])) {
            return $this->redirect(['/mount/member/login']);
        }

        $confData = Conf::findByData('On');

        if (!empty($confData)) {
            foreach ($confData as $key => $value) {
                Yii::$app->params['Conf'][$value['c_key']] = $value['parameter'];
            }
        }

        $model = new LoginForm();

        if (Yii::$app->request->isPost) {

            if ($model->load(Yii::$app->request->post()) && $model->validate()) {

                if ($model->login()) {

                    if (Yii::$app->user->access_token != 'manage') {

                        Yii::$app->getSession()->setFlash('error', '并不是超级管理员 !!');
                        return $this->redirect(['/manage/member/login']);

                    }

                    return $this->redirect(['/manage/center/index']);
                }

                Yii::$app->getSession()->setFlash('error', '登录失败,请检查 !!');
            }

            Yii::$app->getSession()->setFlash('error', '帐号密码有误 !!');
        }

        return $this->render('/manage/center/login', ['model' => $model]);
    }

}
