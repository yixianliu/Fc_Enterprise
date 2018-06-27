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

        $auth = Yii::$app->authManager;

        // 添加数据
        if ($model->load(Yii::$app->request->post())) {

            $data = Yii::$app->request->post();

            // 事务回滚
            $transaction = Yii::$app->db->beginTransaction();

            $role = $auth->createRole($model->name);

            $role->description = $model->description;
            $role->data = $model->data;
            $role->type = 1;

            if (!$auth->add($role)) {

                // 如果操作失败, 数据回滚
                $transaction->rollback();

                Yii::$app->session->setFlash('error', '无法保存数据');
            }

            foreach ($data['Role']['p_key'] as $value) {
                $role = $auth->getRole($data['Role']['name']);
                $permission = $auth->getPermission($value);
                $auth->addChild($role, $permission);
            }

            $transaction->commit();

            return $this->redirect(['index']);

        } else {

            return $this->render('create', [
                'model'  => $model,
                'result' => [
                    'rules' => $this->getRules(),
                    'power' => $auth->getPermissions(),
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

        $auth = Yii::$app->authManager;

        // 初始角色名称
        $defaultRoleName = $model->name;

        if ($model->load(Yii::$app->request->post())) {

            $transaction = Yii::$app->db->beginTransaction();

            // 改关联数据
            $data = Yii::$app->request->post();

            // 重设角色内容
            if ($data['Role']['name'] != $defaultRoleName) {

                $Cls = Role::findOne(['name' => $defaultRoleName]);

                $Cls->name = $data['Role']['name'];
                $Cls->save();
            }

            // 删除所有权限
            $dataRolePower = $auth->getPermissionsByRole($model->name);

            if (AuthRolePermisson::deleteAll(['parent' => $model->name]) || empty($dataRolePower)) {

                foreach ($data['Role']['p_key'] as $value) {
                    $role = $auth->getRole($data['Role']['name']);
                    $permission = $auth->getPermission($value);
                    $auth->addChild($role, $permission);
                }

                // 保存数据
                if ($model->save()) {
                    $transaction->commit();

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }

            $transaction->rollback(); // 如果操作失败, 数据回滚

            Yii::$app->getSession()->setFlash('error', '角色更新失败 !!');
        }

        // 该角色的权限
        $dataPower = $auth->getPermissionsByRole($model->name);

        $model->p_key = array();

        foreach ($dataPower as $value) {
            array_push($model->p_key, $value->name);
        }

        return $this->render('update', [
            'model'  => $model,
            'result' => [
                'rules' => $this->getRules(),
                'power' => $auth->getPermissions(),
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

}
