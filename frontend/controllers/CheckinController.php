<?php

/**
 * @abstract 签到控制器
 * @author   Yxl <zccem@163.com>
 */

namespace app\controllers\Frontend;

use Yii;
use yii\web\Controller;

class CheckinController extends BaseController
{
    
    /**
     * @abstract 首页
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
