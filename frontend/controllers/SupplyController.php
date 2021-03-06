<?php

namespace frontend\controllers;

use common\models\PsbClassify;
use Yii;
use common\models\Supply;
use common\models\SupplySearch;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SupplyController implements the CRUD actions for Supply model.
 */
class SupplyController extends BaseController
{

    public $parent_id = 'S0';

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
                        'actions' => ['index', 'view',],
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
     * Lists all Supply models.
     * @return mixed
     */
    public function actionIndex($type = null)
    {

        $model = empty($type) ? Supply::find() : Supply::find()->where(['c_key' => $type]);

        $dataProvider = new ActiveDataProvider([
            'query'      => $model,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $result['classify'] = PsbClassify::findAll(['is_using' => 'On', 'is_type' => 'Supply', 'parent_id' => $this->parent_id]);

        return $this->render('index', [
            'result'       => $result,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Supply model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Supply model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Supply();

        $model->supply_id = time() . '_' . rand(0000, 9999);

        $model->is_using = 'Off';

        $model->is_send_msg = 'Off';

        $model->user_id = Yii::$app->user->identity->user_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model'  => $model,
            'result' => [
                'classify' => $this->getCls(),
            ]
        ]);
    }

    /**
     * Updates an existing Supply model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model'  => $model,
            'result' => [
                'classify' => $this->getCls(),
            ]
        ]);
    }

    /**
     * Deletes an existing Supply model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Supply model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Supply the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Supply::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function getCls()
    {
        // 初始化
        $result = array();

        // 所有版块
        $dataCls = PsbClassify::findAll(['is_using' => 'On', 'is_type' => 'Supply']);

        foreach ($dataCls as $value) {
            $result[ $value['c_key'] ] = $value['name'];
        }

        return $result;
    }
}
