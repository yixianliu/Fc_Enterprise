<?php

/**
 * @abstract 用户登录控制器
 * @author   Yxl <zccem@163.com>
 */

namespace app\controllers\Frontend;

use Yii;
use yii\web\Controller;
use app\form\LoginForm;
use yii\helpers\Json;

class MemberController extends Controller
{

    // 布局
    public $layout = 'default';

    // 构造
    public function init()
    {
        if (!file_exists(Yii::$app->basePath . '/FcCalendar.md')) {
            return $this->redirect(['/Mount/center/view']);
        }

        $session = Yii::$app->session;

        // 检查 SESSION 是否开启
        if ($session->isActive) {
            return Json::encode(
                ['msg' => 'SESSION 失败,请检查 !!']
            );
        }

        // 开启 SESSION
        $session->open();

        $UserSession = $session->get('FrontUser');

        if (!empty($UserSession['username'])) {
            return $this->redirect(['/Frontend/user/center']);
        }
    }

    /**
     * 登录
     */
    public function actionLogin()
    {

        $model = new LoginForm();

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

        $model = new LoginForm();

        $model->scenario = 'reg';

        if (Yii::$app->request->isAjax) {

            if (!$model->load(Yii::$app->request->post())) {
                return \yii\helpers\Json::encode(['msg' => '提交内容有误 !!']);
            }

            // 验证失败
            if (!$model->validate()) {
                return \yii\helpers\Json::encode($model->getErrors());
            }

            if (!($user = $model->userReg())) {
                return Json::encode(['msg' => '注册失败,请检查 !!']);
            }

            if (!Yii::$app->getUser()->login($user, (3600 * 24 * 30))) {
                return Json::encode(['msg' => '登录异常 !!']);
            }

            return Json::encode(['msg' => '注册成功 !!', 'status' => true]);
        }

        return $this->render('../center/reg', ['model' => $model]);
    }

    /**
     * 登入
     */
    public function actionPostLogin()
    {

    }

}
