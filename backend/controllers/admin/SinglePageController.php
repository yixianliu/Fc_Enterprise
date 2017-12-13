<?php

namespace backend\controllers\admin;

use Faker\Provider\File;
use Yii;
use common\models\SinglePage;
use common\models\SinglePageSearch;
use yii\helpers\FileHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SinglePageController implements the CRUD actions for SinglePage model.
 */
class SinglePageController extends BaseController
{

    public $absolute = 'single_page';

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
     * Lists all SinglePage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SinglePageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SinglePage model.
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
     * Creates a new SinglePage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SinglePage();

        $model->page_id = time() . '_' . rand(0000, 9999);

        $data = Yii::$app->request->post();

        // 创建文件
        if (!empty(Yii::$app->request->post())) {

            $filePath = Yii::getAlias('@frontend') . '/views/pages/';

            $filename = $data['SinglePage']['path'] . '.php';

            if (file_exists($filePath . $filename)) {
                $data = array();
                Yii::$app->getSession()->setFlash('error', '文件已经存在 !!');
            }

            FileHelper::createDirectory($filePath);

            file_put_contents($filePath . $filename, $data['SinglePage']['content']);
        }

        if ($model->load($data) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SinglePage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $data = Yii::$app->request->post();

        // 更改文件
        if (!empty($data)) {

            $filePath = Yii::getAlias('@frontend') . 'views/pages/';

            $filename = $data['SinglePage']['path'] . '.php';

            if (file_exists($filePath . $filename)) {
                $data = array();
                Yii::$app->getSession()->setFlash('error', '文件已经存在 !!');
            }

            file_put_contents($filePath . $filename, $data['SinglePage']['content']);

            $oldFilename = $filePath . $model->path . '.php';

            if (file_exists($oldFilename)) {
                unlink($oldFilename);
            }
        }

        if ($model->load($data) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SinglePage model.
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
     * Finds the SinglePage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SinglePage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SinglePage::findOne($id)) !== null) {
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
    public function actionEfile($id)
    {

        $data = SinglePage::findOne(['page_id' => $id]);

        if (!file_exists($data['path'])) {

        }

        return $this->render('efile', ['result' => $data]);
    }
}
