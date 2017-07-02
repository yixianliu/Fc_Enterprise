<?php

/**
 * @abstract 用户登录控制器
 * @author Yxl <zccem@163.com>
 */

namespace app\controllers\Frontend;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
            return \yii\helpers\Json::encode(['msg' => 'SESSION 失败,请检查 !!']);
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
        return $this->render('login');
    }

    /**
     * 注册
     */
    public function actionReg()
    {
        return $this->render('reg');
    }

    /**
     * 登入
     */
    public function actionPostLogin()
    {

    }

}
