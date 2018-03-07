<?php

namespace backend\controllers\admin;

use Yii;
use common\models\Menu;
use common\models\MenuSearch;
use common\models\MenuModel;
use common\models\ItemRp;
use common\models\Pages;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends BaseController
{

    public $parent_id = 'M0';

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
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex()
    {

        $dataProvider = Menu::findByAll(Yii::$app->request->get('id', 'E1'));

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Menu model.
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
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Menu();

        $parent_id = Menu::findByOne(Yii::$app->request->get('id', null));

        $model->parent_id = empty($parent_id['parent_id']) ? null : $parent_id['m_key'];

        $model->m_key = self::getRandomString();

        // 创建单页面
        if (!empty(Yii::$app->request->post())) {

            $data = Yii::$app->request->post();

            if ($data['Menu']['model_key'] == 'UC1') {

                // 生成自定义页面
                $Cls = new Pages();
                $Cls->saveData($model->m_key, self::getRandomString(), $data['is_type']);
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->m_key]);
        } else {

            return $this->render('create', [
                'model'  => $model,
                'result' => [
                    'parent'     => Menu::getSelectMenu(),
                    'menu_model' => $this->getModel(),
                    'role'       => $this->getRole(),
                ],
            ]);
        }
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // 更改单页面
        if (!empty(Yii::$app->request->post())) {

            $data = Yii::$app->request->post();

            if ($data['Menu']['model_key'] == 'UC1') {

                // 生成自定义页面
                $Cls = Pages::findOne(['m_key' => $id]);
                $Cls->is_type = $data['is_type'];
                $Cls->save();
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->m_key]);
        } else {

            return $this->render('update', [
                'model'  => $model,
                'result' => [
                    'parent'     => Menu::getSelectMenu(),
                    'menu_model' => $this->getModel(),
                    'role'       => $this->getRole(),
                    'data'       => Menu::findByOne($id),
                ],
            ]);
        }
    }

    /**
     * Deletes an existing Menu model.
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
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne(['m_key' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function getModel()
    {

        // 初始化
        $data = array();

        $result = MenuModel::findAll(['is_using' => 'On']);

        foreach ($result as $value) {
            $data[ $value['model_key'] ] = $value['name'];
        }

        return $data;
    }

    public function getRole()
    {
        // 初始化
        $data = array();

        $result = ItemRp::findAll(['type' => 1]);

        foreach ($result as $value) {
            $data[ $value['name'] ] = $value['description'];
        }

        return $data;
    }

}
