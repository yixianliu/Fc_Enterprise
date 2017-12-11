<?php

namespace backend\controllers\admin;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use common\models\Product;
use common\models\ProductClassify;
use common\models\Section;
use backend\models\ProductSearch;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends BaseController
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
                        'actions' => ['index', 'create', 'view', 'update', 'delete',],
                        'allow'   => true,
                        'roles'   => ['@'],
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
     * 操作
     *
     * @return array
     */
    public function actions()
    {
        return [
            'upload' => [
                'class'  => 'kucha\ueditor\UEditorAction',
                'config' => [
                    "imageUrlPrefix"  => Yii::$app->request->getHostInfo() . '/', // 图片访问路径前缀
                    "imagePathFormat" => "/temp/product/{yyyy}{mm}{dd}/{time}{rand:6}", // 上传保存路径
                    "imageRoot"       => Yii::getAlias("@webroot"),
                ],
            ]
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new ProductSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // 初始化
        $result = array();

        $dataCls = ProductClassify::findAll(['is_using' => 'On']);

        foreach ($dataCls as $value) {
            $result['classify'][ $value['c_key'] ] = $value['name'];
        }

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'result'       => $result,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Product();

        $model->product_id = time() . '_' . rand(000, 999);

        $data = array();

        if (!empty(Yii::$app->request->post())) {
            $data = Yii::$app->request->post();
            $data['images'] = $this->setImages($data['images']);
        }

        if ($model->load($data) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model'  => $model,
                'result' => $this->getData(),
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $data = array();

        if (!empty(Yii::$app->request->post())) {
            $data = Yii::$app->request->post();
            $data['images'] = $this->setImages($data['images']);
        }

        if ($model->load($data) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model'  => $model,
                'result' => $this->getData(),
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function getData()
    {
        // 初始化
        $result = array();

        // 所有版块
        $dataSection = Section::findAll(['is_using' => 'On']);

        foreach ($dataSection as $value) {
            $result['section'][ $value['s_key'] ] = $value['name'];
        }

        // 产品等级
        $dataClassify = ProductClassify::findAll(['is_using' => 'On']);

        foreach ($dataClassify as $value) {
            $result['classify'][ $value['c_key'] ] = $value['name'];
        }

        return $result;
    }

    public function setImages($data)
    {
        if (empty($data) || !is_array($data)) {
            return false;
        }

        $result = null;

        foreach ($data as $value) {
            $result .= $value . ',';
        }

        return $result;
    }
}
