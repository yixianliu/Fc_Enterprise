<?php

namespace backend\controllers\admin;

use Yii;
use common\models\PsbClassify;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PsbClsController implements the CRUD actions for PsbClassify model.
 */
class PsbClsController extends BaseController
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
     * Lists all PsbClassify models.
     * @return mixed
     */
    public function actionIndex()
    {

        $id = Yii::$app->request->get( 'id', 'S0' );

        $type = Yii::$app->request->get( 'type', 'Supply' );

        $dataProvider = PsbClassify::findByAll( $id, $type );

        return $this->render( 'index', [
            'dataProvider' => $dataProvider,
            'id'           => $id,
            'type'         => $type,
            'class_name'   => PsbClassify::$parent_cly_name,
        ] );
    }

    /**
     * Displays a single PsbClassify model.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render( 'view', [
            'model' => $this->findModel( $id ),
        ] );
    }

    /**
     * Creates a new PsbClassify model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PsbClassify();

        $model->c_key = self::getRandomString();

        $id = Yii::$app->request->get( 'id', 'S0' );

        $model->is_type = Yii::$app->request->get( 'type', 'Supply' );

        $model->parent_id = Yii::$app->request->get( 'parent_id', null );

        if ($model->load( Yii::$app->request->post() ) && $model->save()) {
            return $this->redirect( ['view', 'id' => $model->c_key] );
        }

        return $this->render( 'create', [
            'model'  => $model,
            'id'     => $id,
            'result' => [
                'classify' => PsbClassify::getClsSelect( $model->is_type, 'On'),
            ],
        ] );
    }

    /**
     * Updates an existing PsbClassify model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel( $id );

        if ($model->load( Yii::$app->request->post() ) && $model->save()) {
            return $this->redirect( ['view', 'id' => $model->c_key] );
        }

        $id = Yii::$app->request->get( 'pid', 'S0' );

        return $this->render( 'update', [
            'model'  => $model,
            'id'     => $id,
            'result' => [
                'classify' => PsbClassify::getClsSelect( $model->is_type, 'On', $id ),
            ],
        ] );
    }

    /**
     * Deletes an existing PsbClassify model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel( $id )->delete();

        return $this->redirect( ['index'] );
    }

    /**
     * Finds the PsbClassify model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return PsbClassify the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PsbClassify::findOne( ['c_key' => $id] )) !== null) {
            return $model;
        }

        throw new NotFoundHttpException( 'The requested page does not exist.' );
    }
}
