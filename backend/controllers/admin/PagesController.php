<?php

namespace backend\controllers\admin;

use common\models\MenuModel;
use Yii;
use common\models\Pages;
use common\models\PagesClassify;
use yii\helpers\FileHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\widgets\Menu;

/**
 * PagesController implements the CRUD actions for Pages model.
 */
class PagesController extends BaseController
{

    public $absolute = 'pages';

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
     * Lists all Pages models.
     * @return mixed
     */
    public function actionIndex()
    {

        // 初始化
        $result = array();

        $dataPages = Pages::findByAll();

        foreach ($dataPages as $key => $value) {
            $result[ $key ] = $value;
            $result[ $key ]['child'] = $this->recursionPages($value);
        }

        return $this->render('index', [
            'result' => $result,
        ]);
    }

    /**
     * 循环单页面
     *
     * @param $data
     * @return array
     */
    public function recursionPages($data)
    {

        if (empty($data))
            return;

        // 初始化
        $result = array();

        $dataPages = Pages::findByAll($data['c_key']);

        if (!empty($dataPages)) {

            foreach ($dataPages as $key => $value) {

                $result[ $key ] = $value;

                // 子分类
                $result[ $key ]['child'] = PagesClassify::findByAll($value['c_key']);

                if (empty($result[ $key ]['child']))
                    continue;

                foreach ($result[ $key ]['child'] as $keys => $values) {
                    $result[ $key ]['child'][ $keys ] = $values;
                    $result[ $key ]['child'][ $keys ]['child'] = $this->recursionPages($values);
                }

            }
        }

        return $result;
    }

    /**
     * Displays a single Pages model.
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
     * Creates a new Pages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pages();

        $model->page_id = self::getRandomString();

        if (!empty($model->getErrors())) {
            Yii::$app->getSession()->setFlash('error', $model->getErrors());
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->page_id]);
        } else {

            return $this->render('create', [
                'model'  => $model,
                'result' => [
                    'menu'     => $this->getMenu(),
                    'classify' => $this->getCls(),
                ],
            ]);
        }
    }

    /**
     * Updates an existing Pages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $data = Yii::$app->request->post();

        if (!empty($model->getErrors())) {
            Yii::$app->getSession()->setFlash('error', $model->getErrors());
        }

        if ($model->load($data) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->page_id]);
        } else {
            return $this->render('update', [
                'model'  => $model,
                'result' => [
                    'menu'     => $this->getMenu(),
                    'classify' => $this->getCls(),
                ],
            ]);
        }
    }

    /**
     * Deletes an existing Pages model.
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
     * Finds the Pages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pages::find()->where([Pages::tableName() . '.page_id' => $id])->joinWith('menu')->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * 编辑 Html 文件
     *
     * @return string
     */
    public function actionFiles($id)
    {

        $data = Pages::findOne(['c_key' => $id]);

        if (!file_exists($data['path'])) {

        }

        return $this->render('efile', ['result' => $data]);
    }

    /**
     * 获取分类
     *
     * @return array
     */
    public function getCls()
    {

        // 初始化
        $result = array();

        $data = Pages::findByAll();

        $result['C0'] = '顶级类目 !!';

        if (empty($data))
            return $result;

        foreach ($data as $value) {
            $result[ $value['c_key'] ] = $value['name'];
        }

        return $result;
    }

    /**
     * 获取菜单
     *
     * @return array
     */
    public function getMenu()
    {

        // 初始化
        $result = array();

        $dataModel = MenuModel::findOne(['name' => '自定义页面']);

        $dataMenu = \common\models\Menu::findAll(['model_key' => $dataModel->model_key]);

        foreach ($dataMenu as $value) {
            $result[ $value['m_key'] ] = $value['name'];
        }

        return $result;
    }

}
