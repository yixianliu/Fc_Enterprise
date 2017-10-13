<?php

/**
 * 首页控制
 *
 * @author Yxl <zccem@163.com>
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class CenterController extends BaseController
{

    /**
     * 首页
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 周
     */
    public function actionWeek()
    {
        return $this->render('week');
    }

}
