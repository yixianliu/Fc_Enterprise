<?php

/**
 * 首页控制
 *
 * @author Yxl <zccem@163.com>
 */

namespace frontend\controllers;

use common\models\ProductClassify;
use Yii;
use yii\web\Controller;

class CenterController extends BaseController
{

    /**
     * 首页
     */
    public function actionIndex()
    {

        // 初始化
        $result = array();

        $result['product-cls'] = ProductClassify::findAll(['is_using' => 'On']);

        return $this->render('index', ['result' => $result]);
    }

    /**
     * 关于我们
     *
     * @return string
     */
    public function actionAbout()
    {



        return $this->render('about');
    }

    /**
     * 周
     */
    public function actionWeek()
    {
        return $this->render('week');
    }

}
