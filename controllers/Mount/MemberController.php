<?php

/**
 * @abstract 挂载中心
 * @author Yxl <zccem@163.com>
 */

namespace app\controllers\Mount;

use Yii;
use yii\web\Controller;
use app\form\MountForm;

class MemberController extends Controller
{

    public $layout = 'mount';

    /**
     * 登录
     */
    public function actionLogin()
    {

        $model = new MountForm();

        if ($model->load(Yii::$app->request->post())) {

            if (!$model->mLogin()) {
                return \yii\helpers\Json::encode(['msg' => '登录失败,请检查 !!']);
            }

            $session = Yii::$app->session;

            // 检查 SESSION 是否开启
            if (!$session->isActive) {
                return \yii\helpers\Json::encode(['msg' => 'Session 失败,请检查 !!']);
            }

            // 开启 SESSION
            $session->open();

            $array = [
                'username' => Yii::$app->params['Username'],
                'time' => time(),
            ];

            $session->set('MountAdmin', $array);

            return \yii\helpers\Json::encode(TRUE);
        }

        return $this->render('login', ['model' => $model]);
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
