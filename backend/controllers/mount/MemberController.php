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

        return ;
    }

    /**
     * 登录
     *
     * @return string
     */
    public function actionLogin()
    {

        $model = new MountForm();

        if (Yii::$app->request->isAjax) {

            if (!$model->load(Yii::$app->request->post())) {
                return Json::encode(['msg' => '载入内容有误 !!']);
            }

            if (!$model->mLogin()) {
                return Json::encode(['msg' => '登录失败,请检查 !!']);
            }

            $session = Yii::$app->session;

            // 检查 SESSION 是否开启
            if (!$session->isActive) {
                return Json::encode(['msg' => 'Session 失败,请检查 !!']);
            }

            // 开启 SESSION
            $session->open();

            $array = [
                'username' => Yii::$app->params['Username'],
                'time'     => time(),
            ];

            $session->set('MountAdmin', $array);

            return Json::encode(['msg' => '登录成功 !!', 'status' => true]);
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
