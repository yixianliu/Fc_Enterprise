<?php

namespace backend\controllers\admin;

use Yii;
use common\models\ProductClassify;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ProductClsController implements the CRUD actions for ProductClassify model.
 */
class ProductClsController extends BaseController
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
     * Lists all ProductClassify models.
     * @return mixed
     */
    public function actionIndex()
    {

        $Cls = new ProductClassify();

        $dataProvider = $Cls->getCls();

        return $this->render( 'index', [
            'dataProvider' => $dataProvider,
        ] );
    }

    /**
     * Displays a single ProductClassify model.
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
     * Creates a new ProductClassify model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new ProductClassify();

        $model->c_key = self::getRandomString();

        $model->parent_id = Yii::$app->request->get( 'id', 'C0' );

        // 所属语言类别
        $model->is_language = Yii::$app->session['language'];

        if ($model->load( Yii::$app->request->post() ) && $model->save()) {
            return $this->redirect( ['view', 'id' => $model->c_key] );
        } else {

            return $this->render( 'create', [
                'model'  => $model,
                'result' => [
                    'classify' => ProductClassify::getClsSelect(),
                ],
            ] );
        }
    }

    /**
     * Updates an existing ProductClassify model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel( $id );

        if ($model->load( Yii::$app->request->post() ) && $model->save()) {
            return $this->redirect( ['view', 'id' => $model->c_key] );
        } else {

            return $this->render( 'update', [
                'model'  => $model,
                'result' => [
                    'classify' => ProductClassify::getClsSelect(),
                ],
            ] );
        }
    }

    /**
     * Deletes an existing ProductClassify model.
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
     * Finds the ProductClassify model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return ProductClassify the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductClassify::findOne( ['c_key' => $id] )) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException( 'The requested page does not exist.' );
        }
    }
}
