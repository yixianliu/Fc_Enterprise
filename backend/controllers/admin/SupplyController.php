<?php

namespace backend\controllers\admin;

use Yii;
use common\models\Supply;
use common\models\SupplySearch;
use common\models\PsbClassify;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SupplyController implements the CRUD actions for Supply model.
 */
class SupplyController extends BaseController
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
     * Lists all Supply models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SupplySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
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

        $model->user_id = '网站管理员';

        $data = Yii::$app->request->post();

        if (!empty($data)) {
            if (!($data = $this->setDate($data)))
                Yii::$app->getSession()->setFlash('error', '时间设置有误 !!');
        }

        if ($model->load($data) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model'  => $model,
            'result' => [
                'classify' => $this->getCls(),
            ],
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

        $model->start_at = date('Y-m-d H:i', $model->start_at);
        $model->end_at = date('Y-m-d H:i', $model->end_at);

        $data = Yii::$app->request->post();

        if (!empty($data)) {
            if (!($data = $this->setDate($data)))
                Yii::$app->getSession()->setFlash('error', '时间设置有误 !!');
        }

        if ($model->load($data) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model'  => $model,
            'result' => [
                'classify' => $this->getCls(),
            ],
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

    /**
     * 设置时间
     *
     * @param $data
     * @return bool
     */
    public function setDate($data)
    {

        if (empty($data['Supply']))
            return false;

        $data['Supply'] = [
            'start_at' => strtotime($data['Supply']['start_at']),
            'end_at'   => strtotime($data['Supply']['end_at']),
        ];

        if ($data['Supply']['start_at'] > $data['Supply']['end_at']) {
            return false;
        }

        return $data;
    }

    /**
     * 获取分类和版块
     *
     * @return array
     */
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
