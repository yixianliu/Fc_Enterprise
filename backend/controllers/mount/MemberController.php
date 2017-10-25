<?php

/**
 * @abstract 挂载中心
 * @author   Yxl <zccem@163.com>
 */

namespace backend\controllers\mount;

use Yii;
use yii\web\Controller;
use yii\helpers\Json;
use backend\models\MountForm;

class MemberController extends Controller
{

    public $layout = false;

    public function init()
    {
        $session = Yii::$app->session;

        if (!empty($session->get('MountAdmin', null))) {
            return $this->redirect(['/mount/center/view']);
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

        $model = new MountForm();

        $session = Yii::$app->session;

        // 检查 SESSION 是否开启
        if (!$session->isActive) {
            Yii::$app->getSession()->setFlash('error', 'Session 失败,请检查 !!');
        }

        // 开启 SESSION
        $session->open();

        // Post
        if (Yii::$app->request->isPost) {

            if (!$model->load(Yii::$app->request->post()) || !$model->validate()) {
                Yii::$app->getSession()->setFlash('error', $model->getErrors());
            }

            if (!$model->mLogin()) {
                Yii::$app->getSession()->setFlash('error', '登录失败,请检查 !!');
            } // 登录成
            else {

                $array = [
                    'username' => Yii::$app->params['Username'],
                    'time'     => time(),
                ];

                $session->set('MountSession', $array);

                Yii::$app->getSession()->setFlash('success', '登录成功 !!');

                return $this->redirect(['mount/center/view']);
            }
        }

        return $this->render('../login', ['model' => $model]);
    }

    /**
     * @abstract 注销
     */
    public function actionLogout()
    {

        $session = Yii::$app->session;

        // 销毁session中所有已注册的数据
        $session->destroy();

        return $this->redirect(['/Mount/member/login']);
    }

}
