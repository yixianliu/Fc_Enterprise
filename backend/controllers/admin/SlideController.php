<?php

namespace backend\controllers\admin;


use common\models\SlideClassify;
use Yii;
use common\models\Slide;
use common\models\SlideSearch;
use common\models\SinglePage;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SlideController implements the CRUD actions for Slide model.
 */
class SlideController extends BaseController
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
     * Lists all Slide models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlideSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slide model.
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
     * Creates a new Slide model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slide();

        // 整合路径
        $result = $this->zpath(Yii::$app->request->post());

        if ($model->load($result) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            return $this->render('create', [
                'model'  => $model,
                'result' => $this->page(),
            ]);
        }
    }

    /**
     * Updates an existing Slide model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        // 整合路径
        $result = $this->zpath(Yii::$app->request->post());

        if ($model->load($result) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            if (!empty($model->getErrors())) {
                Yii::$app->getSession()->setFlash('error', $model->getErrors());
            }

            $result = $this->page();

            $dataImg = explode(',', $model->path);

            foreach ($dataImg as $value) {

                if (empty($value))
                    break;

                $result['img'][] = $value;
            }

            return $this->render('update', [
                'model'  => $model,
                'result' => $result,
            ]);
        }
    }

    /**
     * 路径整合
     *
     * @param $data
     * @return mixed
     */
    public function zpath($data)
    {
        // 整合路径
        if (!empty($data)) {

            $result = $data;

            if (!empty($result['Slide']['path'])) {

                $dataPage = null;

                foreach ($result['Slide']['path'] as $value) {
                    $dataPage .= $value . ',';
                }

                $result['Slide']['path'] = $dataPage;
            }
        } else {
            $result = array();
        }

        return $result;
    }

    /**
     * 固定单页面
     *
     * @return array
     */
    public function page()
    {
        // 初始化
        $result = array();

        // 幻灯片分类
        $dataPageCls = SlideClassify::findAll(['is_using' => 'On']);

        foreach ($dataPageCls as $value) {
            $result['page'][ $value['c_key'] ] = $value['name'];
        }

        // 单页面
        $dataPage = SinglePage::findAll(['is_using' => 'On']);

        foreach ($dataPage as $value) {
            $result['page'][ $value['page_id'] ] = $value['name'];
        }

        return $result;
    }

    /**
     * Deletes an existing Slide model.
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
     * Finds the Slide model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slide the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slide::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
