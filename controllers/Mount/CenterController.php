<?php

/**
 * @abstract 挂载中心
 * @author Yxl <zccem@163.com>
 */

namespace app\controllers\Mount;

use Yii;
use yii\web\Controller;

class CenterController extends BaseController {

    /**
     * @abstract 首页
     */
    public function actionView() {
        return $this->render('view');
    }

    /**
     * @abstract 运行
     */
    public function actionRun() {
        ;
    }

    /**
     * @abstract 个人中心
     */
    public function actionUser() {
        return $this->render('user');
    }

    /**
     * @abstract 关于我们
     */
    public function actionAbout() {

    }

}
