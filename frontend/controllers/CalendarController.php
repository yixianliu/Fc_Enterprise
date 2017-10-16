<?php

/**
 * @abstract 日历中心控制器
 * @author Yxl <zccem@163.com>
 */

namespace app\controllers\Frontend;

use Yii;
use yii\web\Controller;
use frontend\models\MountForm;

class CalendarController extends BaseController {

    public function init() {
        parent::init();
    }

    /**
     * @abstract 首页
     */
    public function actionIndex() {
        
    }

}
