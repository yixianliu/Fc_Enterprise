<?php

namespace backend\controllers\admin;

use Yii;
use common\models\News;
use common\models\NewsClassify;
use common\models\NewsSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends BaseController
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
                        'roles' => [ '@' ],
                    ],
                ],
            ],

            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => [ 'POST' ],
                ],
            ],
        ];
    }

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'result'       => [
                'classify' => NewsClassify::getClsSelect('Off'),
            ],
        ]);
    }

    /**
     * Displays a single News model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new News();

        // 所属语言类别
        $model->is_language = Yii::$app->session[ 'language' ];

        // 旧路径
        $oldFile = $model->images;

        if ( $model->load(Yii::$app->request->post()) ) {

            if ( !$model->save() ) {
                Yii::$app->getSession()->setFlash('error', $model->getErrors());
            }

            self::ImageDelete($model->images, $oldFile, $model->news_id);

            return $this->redirect([ 'view', 'id' => $model->id ]);
        }

        $model->user_id = Yii::$app->user->identity->user_id;

        $model->news_id = self::getRandomString();

        return $this->render('create', [
            'model'  => $model,
            'result' => [
                'classify' => NewsClassify::getClsSelect('Off'),
            ],
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        // 旧路径
        $oldFile = $model->path;

        if ( $model->load(Yii::$app->request->post()) && $model->save() ) {

            self::ImageDelete($model->path, $oldFile, $model->news_id);

            return $this->redirect([ 'view', 'id' => $model->id ]);
        }

        return $this->render('update', [
            'model'  => $model,
            'result' => [
                'classify' => NewsClassify::getClsSelect('Off'),
            ],
        ]);
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect([ 'index' ]);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if ( ($model = News::findOne($id)) !== null ) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
