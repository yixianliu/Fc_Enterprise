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

class MemberController extends Controller {

    /**
     * 登录
     */
    public function actionLogin() {
        return $this->render('login');
    }

    /**
     * 注册
     */
    public function actionReg() {
        return $this->render('reg');
    }

    /**
     * 登入
     */
    public function actionPostLogin()
    {

    }

}
