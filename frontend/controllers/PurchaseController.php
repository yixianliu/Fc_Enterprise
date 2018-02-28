<?php

namespace frontend\controllers;


use common\models\NavClassify;
use common\models\News;
use common\models\SpOffer;
use Yii;
use common\models\Purchase;
use common\models\PsbClassify;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PurchaseController implements the CRUD actions for Purchase model.
 */
class PurchaseController extends BaseController
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
                        'actions' => ['create', 'update', 'delete', 'upload'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                    [
                        'actions' => ['index', 'view', 'center'],
                        'allow'   => true,
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
     * 采购中心
     *
     * @return string
     */
    public function actionCenter()
    {

        // 初始化
        $result = array();

        $result['result'] = Purchase::findAll(['is_using' => 'On']);

        $result['news'] = News::findAll(['is_audit' => 'On']);

        $result['nav'] = NavClassify::findByAll();

        return $this->render('center', [
            'result' => $result,
        ]);
    }

    /**
     * Lists all Purchase models.
     * @return mixed
     */
    public function actionIndex($type = null)
    {

        $model = empty($type) ? Purchase::find()->where(['is_using' => 'On']) : Purchase::find()->where(['c_key' => $type, 'is_using' => 'On']);

        $dataProvider = new ActiveDataProvider([
            'query'      => $model,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $result['classify'] = PsbClassify::findAll(['is_using' => 'On', 'is_type' => 'Purchase', 'parent_id' => 'P0']);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'result'       => $result,
        ]);
    }

    /**
     * Displays a single Purchase model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $model = Purchase::findOne(['purchase_id' => $id, 'is_using' => 'On']);

        if (empty($model))
            return $this->redirect(['index']);

        $modelOffer = new SpOffer();

        return $this->render('view', [
            'model'      => $model,
            'modelOffer' => $modelOffer,
        ]);
    }

    /**
     * Creates a new Purchase model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Purchase();

        $model->purchase_id = time() . '_' . rand(0000, 9999);

        $model->is_using = 'Off';

        $model->is_send_msg = 'Off';

        $model->user_id = Yii::$app->user->identity->user_id;

        if (!empty($model->getErrors())) {
            Yii::$app->getSession()->setFlash('error', $model->getErrors());
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model'  => $model,
                'result' => [
                    'classify' => $this->getCls(),
                ]
            ]);
        }
    }

    /**
     * Updates an existing Purchase model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model'  => $model,
                'result' => [
                    'classify' => $this->getCls(),
                ]
            ]);
        }
    }

    /**
     * Deletes an existing Purchase model.
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
     * Finds the Purchase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Purchase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Purchase::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function getCls()
    {
        // 初始化
        $result = array();

        // 所有版块
        $dataCls = PsbClassify::findAll(['is_using' => 'On', 'is_type' => 'Purchase']);

        foreach ($dataCls as $value) {
            $result[ $value['c_key'] ] = $value['name'];
        }

        return $result;
    }
}
