<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/9/28
 * Time: 16:50
 */

namespace frontend\controllers;

use Yii;
use common\models\Order;
use common\models\Product;
use linslin\yii2\curl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class OrderController extends BaseController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => [ 'POST' ],
                ],
            ],

        ];
    }

    public function actionCreate()
    {

        if (Yii::$app->user->isGuest) {
            throw new NotFoundHttpException( '请登录或者注册后操作!' );
        }

        if (Yii::$app->request->isPost) {

            $productId = Yii::$app->request->get( 'pid', null );

            $productData = Product::findByOne( $productId );

            $url = 'http://www.yxlcms.com:7777/Wx_Platform/backend/web/index.php/pay/web-curl-pay?id=1';

            // 订单模型
            $orderModel = new Order();

            $orderModel->order_id = self::getRandomString();

            // 需要提交的内容
            $postArray = [
                'data'       => $productData,
                'id'         => $orderModel->order_id,
                'type'       => 'product',
                'total_fee'  => $productData['price'],
                'body'       => $productData['introduction'],
                'detail'     => $productData['content'], // 商品详情
                'goods_tag'  => '', // 商品标记
                'time_start' => date( 'YmdHis' ), // 订单生成时间，格式为yyyyMMddHHmmss
                'scene_info' => \GuzzleHttp\json_encode( [ 'h5_info' => [ 'type' => 'web', 'wap_url' => $url, 'web_name' => '购买产品 - ' . $productData['title'] ] ] ), // 该字段用于上报支付的场景信息,针对H5支付有以下三种场景,请根据对应场景上报
            ];

            $curl = new curl\Curl();

            $curl->setOption( CURLOPT_SSL_VERIFYPEER, false );

            // Post http://example.com/, reset request before
            $curl->reset()->setOption( CURLOPT_POSTFIELDS, http_build_query( $postArray ) )->post( $url );

            // Json
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            // 事务回滚
            $transaction = Yii::$app->db->beginTransaction();

            if (empty( $curl->response )) {

                // 回滚事务
                $transaction->rollback();

                return Yii::$app->response->data = [ 'status' => false, 'msg' => '没有连接上平台!', ];
            }

            $response = json_decode( $curl->response, true );

            if ($response['status'] == false) {

                // 回滚事务
                $transaction->rollback();

                return Yii::$app->response->data = [ 'status' => false, 'msg' => $response['msg'] ];
            }

            $orderModel->price = $productData['price'];
            $orderModel->content = $productData['content'];
            $orderModel->title = $productData['title'];
            $orderModel->created_at = time();
            $orderModel->updated_at = time();

            if ($orderModel->save( false )) {

                // 回滚事务
                $transaction->rollback();

                return Yii::$app->response->data = [ 'status' => false, 'msg' => '保存订单异常!' ];
            }

            $transaction->commit();

            return Yii::$app->response->data = [ 'status' => true, 'msg' => $response['msg'] ];
        }

        throw new NotFoundHttpException( '异常提交!' );
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

        $modelProduct = Product::findOne( [ 'product_id' => $id ] );

        $model = new Order();

        $model->order_id = self::getRandomString();

        return $this->render( 'view', [ 'model' => $model, 'modelProduct' => $modelProduct ] );
    }
}