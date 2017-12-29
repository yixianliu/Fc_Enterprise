<?php

namespace backend\controllers\admin;

use Yii;
use common\models\Menu;
use common\models\MenuSearch;
use common\models\MenuModel;
use common\models\PagesClassify;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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

        $searchModel = new MenuSearch();

        $dataProvider = Menu::findAll(['parent_id' => Yii::$app->request->get('id', 'E1')]);

        // 选项卡
        $parent = Menu::findAll(['parent_id' => $this->parent_id]);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'parent'       => $parent,
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

        $model->parent_id = Yii::$app->request->get('id', 'E1');

        $result = [
            'parent'     => $this->getMenu(),
            'menu_model' => $this->getModel(),
            'pages'      => $this->getPages(),
        ];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model'  => $model,
                'result' => $result,
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

        $result = [
            'parent'     => $this->getMenu(),
            'menu_model' => $this->getModel(),
            'pages'      => $this->getPages(),
        ];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model'  => $model,
                'result' => $result,
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
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * 整理菜单为 select
     *
     * @return static[]
     */
    public function getMenu()
    {

        // 初始化
        $result = array();

        $dataMenu = Menu::findAll(['parent_id' => $this->parent_id]);

        foreach ($dataMenu as $value) {
            $result[ $value['name'] ] = $this->recursionMenu($value);
        }

        return $result;
    }

    public function recursionMenu($value)
    {

        if (empty($value))
            return;

        // 初始化
        $result = array();

        $dataMenu = Menu::findAll(['is_using' => 'On']);

        foreach ($dataMenu as $value) {
            $result[ $value['m_key'] ] = $value['name'];
        }

        return $result;
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

    public function getPages()
    {
        // 初始化
        $data = array();

        $result = PagesClassify::findAll(['is_using' => 'On']);

        foreach ($result as $value) {
            $data[ $value['c_key'] ] = $value['name'];
        }

        return $data;
    }

}
