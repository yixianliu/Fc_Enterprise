<?php

/**
 * @abstract 用户控制器
 * @author Yxl <zccem@163.com>
 */

namespace app\controllers\Frontend;

use Yii;
use yii\web\Controller;

class UserController extends BaseController {

    public function init() {
        parent::init();
    }

    /**
     * @abstract 首页
     */
    public function actionIndex() {
        
    }

}
