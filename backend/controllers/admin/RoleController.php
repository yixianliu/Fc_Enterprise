<?php

namespace backend\controllers\admin;


use Yii;
use common\models\ItemRp;
use common\models\Rules;
use common\models\RoleSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ItemRpController implements the CRUD actions for ItemRp model.
 */
class RoleController extends BaseController
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
     * Lists all ItemRp models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new RoleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, 'role');

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ItemRp model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ItemRp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new ItemRp();

        if ($model->load(Yii::$app->request->post())) {

            $auth = Yii::$app->authManager;

            $role = $auth->createRole($model->name);

            $role->description = $model->description;
            $role->data = $model->data;
            $role->type = $model->type;

            if (!$auth->add($role)) {
                Yii::$app->session->setFlash('error', '无法保存数据');
            }

            return $this->redirect(['view', 'id' => $model->name]);

        } else {

            return $this->render('create', [
                'model'  => $model,
                'result' => [
                    'rules' => $this->getRules(),
                    'power' => $this->getPower(),
                ]
            ]);

        }
    }

    /**
     * Updates an existing ItemRp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        }

        return $this->render('update', [
            'model'  => $model,
            'result' => [
                'rules' => $this->getRules(),
                'power' => $this->getPower(),
            ]
        ]);

    }

    /**
     * Deletes an existing ItemRp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ItemRp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return ItemRp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ItemRp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * 获取规则
     *
     * @return array
     */
    public function getRules()
    {

        // 初始化
        $result = array();

        $data = Rules::findByAll();

        foreach ($data as $value) {
            $result[ $value['name'] ] = $value['description'];
        }

        return $result;
    }

    /**
     * 获取权限
     *
     * @return array
     */
    public function getPower()
    {
        // 初始化
        $result = array();

        $data = ItemRp::findByAll('permission');

        foreach ($data as $value) {
            $result[ $value['name'] ] = $value['description'];
        }

        return $result;
    }
}
