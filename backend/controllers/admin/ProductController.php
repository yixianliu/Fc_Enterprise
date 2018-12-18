<?php

namespace backend\controllers\admin;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use common\models\Product;
use common\models\ProductClassify;
use backend\models\ProductSearch;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search( Yii::$app->request->queryParams );

        // 初始化
        $result = [];

        $dataCls = ProductClassify::findByAll();

        foreach ($dataCls as $value) {
            $result['classify'][ $value['c_key'] ] = $value['name'];
        }

        return $this->render( 'index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'result'       => $result,
        ] );
    }

    /**
     * Displays a single Product model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render( 'view', [
            'model' => $this->findModel( $id ),
        ] );
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Product();

        $model->user_id = Yii::$app->user->identity->username;

        // 所属语言类别
        $model->is_language = Yii::$app->session['language'];

        // 旧路径
        $oldFile = $model->images;

        if ($model->load( Yii::$app->request->post() ) && $model->save()) {

            self::ImageDelete( $model->images, $oldFile, $model->product_id );

            return $this->redirect( ['view', 'id' => $model->id] );
        }

        $model->product_id = self::getRandomString();

        return $this->render( 'create', [
            'model'  => $model,
            'result' => [
                'classify' => ProductClassify::getClsSelect(),
            ],
        ] );
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel( $id );

        // 旧路径
        $oldFile = $model->images;

        if ($model->load( Yii::$app->request->post() ) && $model->save()) {

            self::ImageDelete( $model->images, $oldFile, $model->product_id );

            return $this->redirect( ['view', 'id' => $model->id] );
        }

        return $this->render( 'update', [
            'model'  => $model,
            'result' => [
                'classify' => ProductClassify::getClsSelect(),
            ],
        ] );
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel( $id )->delete();

        return $this->redirect( ['index'] );
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne( $id )) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException( '页面输出异常.' );
        }
    }

    /**
     * 批量复制
     *
     * @return array|\yii\web\Response
     * @throws \yii\db\Exception
     */
    public function actionBatchCreate()
    {

        if (!Yii::$app->request->isAjax) {
            Yii::$app->getSession()->setFlash( 'error', '非法提交模式!' );
            return $this->redirect( 'index' );
        }

        // 需要复制的 Id
        $id = Yii::$app->request->get( 'id', null );

        if (empty( $id )) {
            return ['status' => false, 'msg' => '请选择内容!'];
        }

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if (empty( $id )) {
            Yii::$app->getSession()->setFlash( 'error', '没有选择内容!' );
            return ['status' => false];
        }

        $arrayId = explode( ',', $id );

        $connection = Yii::$app->db->beginTransaction();

        foreach ($arrayId as $value) {

            if (empty( $value ))
                continue;

            $modelDef['Product'] = Product::findOne( ['id' => $value] )->toArray();

            if (empty( $modelDef['Product'] ))
                continue;

            $title = explode( '_', $modelDef['Product']['title'] );

            $modelDef['Product']['title'] = $title[0] . '_' . '复制内容' . '_' . self::getRandomString();
            $modelDef['Product']['product_id'] = self::getRandomString();
            $modelDef['Product']['images'] = null;
            $modelDef['Product']['thumbnail'] = null;

            $model = new Product();

            if (!$model->load( $modelDef, 'Product' )) {
                $connection->rollBack();
                Yii::$app->getSession()->setFlash( 'error', '无法载入数据!' );
                return ['status' => false];
            }

            if (!$model->save( false )) {
                $connection->rollBack();
                Yii::$app->getSession()->setFlash( 'error', '内容无法复制!' );
                return ['status' => false];
            }

        }

        $connection->commit();

        Yii::$app->getSession()->setFlash( 'success', '复制成功!' );

        return ['status' => true];
    }

    /**
     * 移动分类
     *
     * @return string
     */
    public function actionBatchMovie()
    {

        $id = Yii::$app->request->get( 'id', null );

        if (empty( $id )) {
            Yii::$app->getSession()->setFlash( 'error', '请选择内容!' );
            return $this->redirect( ['index'] );
        }

        if (Yii::$app->request->isPost) {

        }

        $model = new Product();

        $data = [];

        $dataId = explode( ',', $id );

        foreach ($dataId as $key => $value) {

            if (empty( $value ))
                continue;

            $data[$key] = Product::findOne( ['id' => $value] );

            // 缩略图
            $filename = Yii::getAlias( '@web/../../frontend/web/temp/product/' ) . $data[$key]->product_id . '/' . $data[$key]->thumbnail;

            if (empty( $model->thumbnail ) && !file_exists( $filename ))
                $filename = Yii::getAlias( '@web/../../frontend/web/img/not.jpg' );

            $data[$key]['thumbnail'] = $filename;
        }

        return $this->render( 'movie', ['model' => $model, 'result' => [
            'classify' => ProductClassify::getClsSelect(),
            'data'     => $data,
        ]] );
    }

    public function actionBatchDelete()
    {

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return ['status' => true, 'msg' => '删除成功!'];
    }

}
