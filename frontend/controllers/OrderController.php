<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/9/28
 * Time: 16:50
 */

namespace frontend\controllers;

use common\models\Product;
use Yii;
use common\models\Order;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class OrderController extends BaseController
{

    public function actionCreate()
    {

        if ( Yii::$app->user->isGuest ) {
            throw new NotFoundHttpException('请登录或者注册后操作!');
        }

        if ( Yii::$app->request->isPost ) {

            $productId = Yii::$app->request->get('pid', null);

            $productData = Product::findByOne($productId);

            $url = 'http://yandex.ru/search/';

            $curl = new curl\Curl();

            //post http://example.com/, reset request before
            $response = $curl->reset()->setOption(CURLOPT_POSTFIELDS, http_build_query(['order' => $productData]))->post($url);

            return $curl->response;
        }

        throw new NotFoundHttpException('异常提交!');
    }

    /**
     * 确认订单
     *
     * @param $id
     *
     * @return string
     */
    public function actionView($id)
    {

        $model = Product::findOne(['product_id' => $id]);

        return $this->render('view', ['model' => $model]);
    }
}