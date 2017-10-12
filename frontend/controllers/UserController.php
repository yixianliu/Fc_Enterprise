<?php

/**
 * @abstract 用户控制器
 * @author   Yxl <zccem@163.com>
 */

namespace app\controllers\Frontend;

use app\models\User;

class UserController extends BaseController
{

    /**
     * @abstract 用户中心
     */
    public function actionIndex()
    {

        $this->isUser();

        return $this->render('index');
    }

    /**
     * 签到
     *
     * @return string
     */
    public function actionCheck()
    {
        return $this->render('check');
    }

}
