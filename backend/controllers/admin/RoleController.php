<?php

namespace backend\controllers\admin;


use common\models\AuthRolePermisson;
use Yii;
use common\models\Role;
use common\models\Rules;
use common\models\RoleSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * RoleController implements the CRUD actions for Role model.
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
     * Lists all Role models.
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
     * Displays a single Role model.
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
     * Creates a new Role model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Role();

        if ($model->load(Yii::$app->request->post())) {

            $auth = Yii::$app->authManager;

            $role = $auth->createRole($model->name);

            $role->description = $model->description;
            $role->data = $model->data;
            $role->type = $model->type;

            if (!$auth->add($role)) {
                Yii::$app->session->setFlash('error', '无法保存数据');
            }

            return $this->redirect(['view', 'id' => $model->id]);

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
     * Updates an existing Role model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $transaction = Yii::app()->db->beginTransaction();

            // 改关联数据
            $data = Yii::$app->request->post();


            $dataRolePer = AuthRolePermisson::findByAll();

            foreach ($dataRolePer as $value) {

                $AuthRolePerCls = AuthRolePermisson::findOne($value->id);

                $AuthRolePerCls->parent = $data['Role']['name'];
                $AuthRolePerCls->child = $value['child'];

                if ($AuthRolePerCls->save())
                    continue;

            }

            $auth = Yii::$app->authManager;

            // 权限关联
            $query = new AuthRolePermisson();
            $query->delete(['parent' => $model->name]);

            foreach ($data['Role']['p_key'] as $row) {
                $permission = $auth->getPermission($row);
                $auth->addChild($data['Role']['name'], $permission);
            }

            // 保存数据
            if ($model->save()) {
                $transaction->commit();

                return $this->redirect(['view', 'id' => $model->id]);
            }

            $transaction->rollback(); // 如果操作失败, 数据回滚
        }

        return $this->render('update', [
            'model'  => $model,
            'result' => [
                'rules' => $this->getRules(),
                'power' => $this->getPower($model->name),
            ]
        ]);

    }

    /**
     * Deletes an existing Role model.
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
     * Finds the Role model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Role the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Role::findOne($id)) !== null) {
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
     * @param null $name
     * @return array
     */
    public function getPower($name = null)
    {
        // 初始化
        $result = array();

        $auth = Yii::$app->authManager;

        // 获取角色对应权限列表
        $data = (empty($name)) ? $auth->getPermissions() : $auth->getPermissionsByRole($name);

        foreach ($data as $value) {
            $result[ $value['name'] ] = $value['description'];
        }

        return $result;
    }
}
