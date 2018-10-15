<?php

/**
 * 首页控制
 *
 * @author Yxl <zccem@163.com>
 */

namespace frontend\controllers;

use Yii;
use common\models\News;
use common\models\PagesList;
use common\models\ProductClassify;

class CenterController extends BaseController
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * 首页
     */
    public function actionIndex()
    {

        // 初始化
        $result = [];

        $result['product-cls'] = ProductClassify::findByAll();

        $result['news'] = News::findByAll( 5 );

        $result['newsTop'] = News::findByHot();

        // 工程案例
        $result['data'] = PagesList::findByAll( '1519630269_1502' );

        foreach ($result['data'] as $key => $value) {

            if (empty( $value['path'] ))
                continue;

            $imgArray = explode( ',', $value['path'] );

            $result['data'][ $key ]['img'] = $imgArray[0];

        }

        return $this->render( 'index', ['result' => $result] );
    }

    /**
     * 关于我们
     *
     * @return string
     */
    public function actionAbout()
    {

        return $this->render( 'about' );
    }

    /**
     * 周
     */
    public function actionWeek()
    {
        return $this->render( 'week' );
    }

    public function actionError()
    {

        $exception = Yii::$app->errorHandler->exception;

        $message = Yii::$app->errorHandler->exception->getMessage();

        if ($exception !== null) {
            return $this->render( 'error', ['exception' => $exception, 'message' => $message] );
        }

        return;
    }

    /**
     * 语言切换
     */
    public function actionLanguage()
    {

        $language = \Yii::$app->request->get( 'lang' );

        if (isset( $language )) {
            \Yii::$app->session['language'] = $language;
        }

        //切换完语言哪来的返回到哪里
        $this->goBack( \Yii::$app->request->headers['Referer'] );

        return;
    }

}
