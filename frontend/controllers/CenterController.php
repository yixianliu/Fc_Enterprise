<?php

/**
 * 首页控制
 *
 * @author Yxl <zccem@163.com>
 */

namespace frontend\controllers;

use common\models\News;
use common\models\PagesList;
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

        $result['product-cls'] = ProductClassify::findByAll();

        $result['news'] = News::findAll(['is_audit' => 'On']);

        // 工程案例
        $result['data'] = PagesList::findByAll('1519630269_1502');

        foreach ($result['data'] as $key => $value) {

            if (empty($value['path']))
                continue;

            $imgArray = explode(',', $value['path']);

            $result['data'][$key]['img'] = $imgArray[0];

        }

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
