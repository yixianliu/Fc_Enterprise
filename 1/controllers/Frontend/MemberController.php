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
        if (!file_exists(Yii::getAlias('@webroot') . '/FcCalendar.md')) {
            return $this->redirect(['/Mount/center/view']);
        }

        if (!Yii::$app->user->isGuest) {
//            return $this->redirect(['/Frontend/member/login']);
        }

        return ;
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
                return Json::encode(['msg' => '提交内容有误 !!']);
            }

            // 验证失败
            if (!$model->validate()) {
                return Json::encode($model->getErrors());
            }

            if (!($user = $model->userReg())) {
                return Json::encode(['msg' => '注册失败,请检查 !!']);
            }

            if (!Yii::$app->getUser()->login($user, (3600 * 24 * 30))) {
                return Json::encode(['msg' => '注册用户异常 !!']);
            }

            return Json::encode(['msg' => '注册成功 !!', 'status' => true]);
        }

        return $this->render('../center/reg', ['model' => $model]);
    }

    /**
     * 注销用户
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->getSession()->destroy();

        return $this->goHome();
    }

}
