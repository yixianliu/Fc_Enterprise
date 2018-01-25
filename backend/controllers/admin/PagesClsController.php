<?php

namespace backend\controllers\admin;

use Yii;
use common\models\PagesClassify;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PagesClsController implements the CRUD actions for PagesClassify model.
 */
class PagesClsController extends BaseController
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
     * Lists all PagesClassify models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new PagesClassify();

        $dataProvider = $model->getCls(Yii::$app->request->get('id', 'C0'));

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PagesClassify model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PagesClassify model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PagesClassify();

        $model->parent_id = Yii::$app->request->get('id', 'C0');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->c_key]);
        } else {
            return $this->render('create', [
                'model'  => $model,
                'result' => $this->getCls(),
            ]);
        }
    }

    /**
     * Updates an existing PagesClassify model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->c_key]);
        } else {
            return $this->render('update', [
                'model'  => $model,
                'result' => $this->getCls(),
            ]);
        }
    }

    /**
     * Deletes an existing PagesClassify model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PagesClassify model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PagesClassify the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PagesClassify::findOne(['c_key' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function getCls()
    {

        // 初始化
        $result = array();

        $dataCls = PagesClassify::findAll(['is_using' => 'On']);

        $result['classify'] = ['C0' => '顶级父类'];

        foreach ($dataCls as $value) {
            $result['classify'][ $value['c_key'] ] = $value['name'];
        }

        return $result;
    }
}
