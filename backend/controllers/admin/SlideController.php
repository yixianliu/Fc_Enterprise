<?php

namespace backend\controllers\admin;


use Yii;
use common\models\Slide;
use common\models\SlideSearch;
use common\models\SinglePage;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


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

        $model->slide_id = time() . '_' . rand(0000, 9999);

        // 整合路径
        $result = $this->zpath(Yii::$app->request->post());

        if ($model->load($result) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->slide_id]);
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
            return $this->redirect(['view', 'id' => $model->slide_id]);
        } else {

            $result = $this->page();

            $dataImg = explode(', ', $model->path);

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
                    $dataPage .= $value . ', ';
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

        $result['page'] = [
            'index' => '网站首页',
            'job'   => '招聘中心',
        ];

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

    /**
     * 上传
     *
     * @return string
     */
    public function actionImageUpload($id)
    {
        $model = new Slide();

        // 上传组件对应model
        $imageFile = UploadedFile::getInstance($model, 'path');

        $directory = Yii::getAlias('@backend/web/temp') . DIRECTORY_SEPARATOR . 'Slide' . DIRECTORY_SEPARATOR;

        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        if ($imageFile) {

            $uid = time() . '_' . rand(00000, 99999);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;

            if ($imageFile->saveAs($filePath)) {

                $path = Yii::getAlias('@web') . '/temp/Slide' . DIRECTORY_SEPARATOR . $fileName;

                return Json::encode([
                    'files' => [
                        [
                            'name'         => $fileName,
                            'size'         => $imageFile->size,
                            'url'          => $path,
                            'thumbnailUrl' => $path,
                            'deleteUrl'    => Url::to(['admin/slide/image-delete', 'name' => $fileName]),
                            'deleteType'   => 'GET',
                        ],
                    ],
                ]);
            }
        }

        return Json::encode(['message' => '上传失败 !!']);
    }

    /**
     * 删除
     *
     * @param $name
     * @return mixed
     */
    public function actionImageDelete($name)
    {
        $directory = Yii::getAlias('@backend/web/temp/Slide');

        if (is_file($directory . DIRECTORY_SEPARATOR . $name)) {
            unlink($directory . DIRECTORY_SEPARATOR . $name);
        }

        $files = FileHelper::findFiles($directory);

        $output = [];

        foreach ($files as $file) {

            $fileName = basename($file);
            $path = '/img/temp/Slide' . DIRECTORY_SEPARATOR . $fileName;

            $output['files'][] = [
                'name'         => $fileName,
                'size'         => filesize($file),
                'url'          => $path,
                'thumbnailUrl' => $path,
                'deleteUrl'    => 'admin/slide/image-delete?name=' . $fileName,
                'deleteType'   => 'GET',
            ];
        }

        return Json::encode($output);
    }
}
