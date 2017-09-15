<?php

/**
 * @abstract 个人中心
 * @author Yxl <zccem@163.com>
 */

namespace app\controllers\Mount;

use Yii;
use yii\web\Controller;

class UserController extends BaseController {

    /**
     * @abstract 首页
     */
    public function actionIndex() {
        return $this->render('../user');
    }

}
