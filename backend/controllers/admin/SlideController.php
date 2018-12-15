<?php

namespace backend\controllers\admin;

use Yii;
use common\models\Slide;
use common\models\Pages;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use common\models\SlideClassify;

/**
 * SlideController implements the CRUD actions for Slide model.
 */
class SlideController extends BaseController
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
     * Lists all Slide models.
     * @return mixed
     */
    public function actionIndex()
    {
        // add conditions that should always apply here
        $query = Slide::find()->where( ['is_language' => Yii::$app->session['language']] )->orderBy( ['updated_at' => SORT_DESC] );

        $dataProvider = new ActiveDataProvider( [
            'query' => $query,
        ] );

        return $this->render( 'index', [
            'dataProvider' => $dataProvider,
        ] );
    }

    /**
     * Displays a single Slide model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {

        $model = Slide::findByOne( $id );

        return $this->render( 'view', [
            'model' => $model,
        ] );
    }

    /**
     * Creates a new Slide model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Slide();

        $model->is_language = Yii::$app->session['language'];

        // 旧路径
        $oldFile = $model->path;

        if ($model->load( Yii::$app->request->post() )) {

            self::ImageDelete( $model->path, $oldFile );

            $cKeyArray = Yii::$app->request->post( 'Slide' );

            $model->c_key = null;

            foreach ($cKeyArray['c_key'] as $value) {
                $model->c_key = $value . ',' . $model->c_key;
            }

            if (!$model->save()) {
                Yii::$app->getSession()->setFlash( 'error', '配置异常!' );
                return $this->redirect( ['create'] );
            }

            return $this->redirect( ['view', 'id' => $model->id] );

        } else {

            return $this->render( 'create', [
                'model'  => $model,
                'result' => [
                    'page' => SlideClassify::getSlideSelect(),
                ],
            ] );
        }
    }

    /**
     * Updates an existing Slide model.
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
            return $this->redirect( ['view', 'id' => $model->id] );
        } else {

            if (!empty( $model->getErrors() )) {
                Yii::$app->getSession()->setFlash( 'error', $model->getErrors() );
            }

            $result = $this->page();

            $dataImg = explode( ',', $model->path );

            foreach ($dataImg as $value) {

                if (empty( $value ))
                    break;

                $result['img'][] = $value;
            }

            return $this->render( 'update', [
                'model'  => $model,
                'result' => $result,
            ] );
        }
    }

    /**
     * Deletes an existing Slide model.
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
     * Finds the Slide model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Slide the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slide::findOne( $id )) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException( 'The requested page does not exist.' );
        }
    }
}
