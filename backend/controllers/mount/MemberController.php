<?php

/**
 * @abstract 挂载中心
 * @author   Yxl <zccem@163.com>
 */

namespace backend\controllers\mount;

use Yii;
use yii\web\Controller;
use backend\models\MountForm;

class MemberController extends Controller
{

    public $layout = false;

    /**
     * 登录
     *
     * @return string
     */
    public function actionLogin()
    {

        $model = new MountForm();

        $session = Yii::$app->session;

        // 开启 SESSION
        $session->open();

        if (!empty($session->get('MountAdmin', null))) {
            return $this->redirect(['/mount/center/view']);
        }

        // Post
        if (Yii::$app->request->isPost) {

            if (!$model->load(Yii::$app->request->post()) || !$model->validate()) {
                Yii::$app->getSession()->setFlash('error', $model->getErrors());
            }

            if (!$model->mLogin()) {
                Yii::$app->getSession()->setFlash('error', '登录失败,请检查 !!');
            } // 登录成功
            else {

                $array = [
                    'Username' => Yii::$app->params['Username'],
                    'time'     => time(),
                ];

                $session->set('MountSession', $array);

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
