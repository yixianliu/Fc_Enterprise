<?php

namespace backend\controllers\admin;

use common\models\Menu;
use common\models\Pages;
use common\models\PagesClassify;
use Yii;
use common\models\PagesList;
use common\models\PagesListSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PagesListController implements the CRUD actions for PagesList model.
 */
class PagesListController extends BaseController
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
     * Lists all PagesList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PagesListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'result'       => [
                'page'     => $this->getPage(),
                'classify' => $this->getCls(),
            ]
        ]);
    }

    /**
     * Displays a single PagesList model.
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
     * Creates a new PagesList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new PagesList();
        $data = array();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $id = Yii::$app->request->get('id', null);

        if (!empty($id)) {
            $data = Menu::findByOne($id);
            $model->page_id = $data['pages']['page_id'];
        }

        return $this->render('create', [
            'model'  => $model,
            'result' => [
                'page'     => $this->getPage(),
                'classify' => $this->getCls(),
                'data'     => $data,
            ]
        ]);
    }

    /**
     * Updates an existing PagesList model.
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
                'page'     => $this->getPage(),
                'classify' => $this->getCls(),
            ]
        ]);
    }

    /**
     * Deletes an existing PagesList model.
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
     * Finds the PagesList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PagesList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PagesList::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * 获取页面
     *
     * @return array
     */
    public function getPage()
    {

        // 初始化
        $resultMenu = array();

        $Cls = new Menu();

        $result = $Cls->getSelectMenu('E1');

        if (empty($result))
            return;

        foreach ($result as $key => $value) {

            $data = Menu::findByOne($key);

            if (empty($data))
                continue;

            if ($data['menuModel']['model_key'] != 'UC1' || $data['pages']['is_type'] != 'list')
                unset($result[ $key ]);

            $resultMenu[ $data['pages']['page_id'] ] = $data['name'];
        }

        return $resultMenu;
    }

    /**
     * 获取分类
     *
     * @return array
     */
    public function getCls()
    {

        $Cls = new PagesClassify();

        $result = $Cls->getClsSelect();

        return $result;
    }
}
