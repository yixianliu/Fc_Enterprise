<?php

/**
 * 首页控制
 *
 * @author Yxl <zccem@163.com>
 */

namespace frontend\controllers;

use common\models\News;
use common\models\ProductClassify;

class CenterController extends BaseController
{

    /**
     * 首页
     */
    public function actionIndex()
    {

        // 初始化
        $result = array();

        $result['product-cls'] = ProductClassify::findByAll('C0');

        $result['news'] = News::findAll(['is_audit' => 'On']);

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
