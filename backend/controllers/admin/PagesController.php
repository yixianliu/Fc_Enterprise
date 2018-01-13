<?php

namespace backend\controllers\admin;

use common\models\Pages;
use common\models\PagesTplFile;
use Yii;
use common\models\SinglePage;
use common\models\SinglePageSearch;
use common\models\PagesClassify;
use yii\helpers\FileHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SinglePageController implements the CRUD actions for SinglePage model.
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
     * Lists all SinglePage models.
     * @return mixed
     */
    public function actionIndex()
    {

        // 初始化
        $result = array();

        $dataPages = PagesClassify::findAll(['parent_id' => 'C0']);

        foreach ($dataPages as $key => $value) {
            $result[ $key ] = $value->toArray();
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

        $dataPages = Pages::findAll(['c_key' => $data['c_key']]);

        if (!empty($dataPages)) {

            foreach ($dataPages as $key => $value) {

                $result[ $key ] = $value->toArray();
                $result[ $key ]['child'] = PagesClassify::findAll(['parent_id' => $value['c_key']]);

                if (empty($result[ $key ]['child']))
                    continue;

                foreach ($result[ $key ]['child'] as $keys => $values) {
                    $result[ $key ]['child'][ $keys ] = $values->toArray();
                    $result[ $key ]['child'][ $keys ]['child'] = $this->recursionPages($values);
                }

            }
        }

        return $result;
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

        // 生成 PHP
        if (!empty($data) && !empty($data['SinglePage']['path'])) {
            $data['SinglePage']['path'] = $this->setFile($data['SinglePage']['path'], $model->page_id);
        }

        if ($model->load($data) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model'  => $model,
                'result' => [
                    'classify' => $this->getCls(),
                    'file'     => $this->getFile(),
                ],
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

        // 生成 PHP
        if (!empty($data)) {
            if (!empty($data['SinglePage']['path']) && empty($model->path)) {
                $data['SinglePage']['path'] = $this->setFile($data['SinglePage']['path'], $model->page_id);
            } else {
                $data['SinglePage']['path'] = $model->path;
            }
        }

        if ($model->load($data) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model'  => $model,
                'result' => [
                    'classify' => $this->getCls(),
                    'file'     => $this->getFile(),
                ],
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

        $data = SinglePage::findOne(['c_key' => $id]);

        if (!file_exists($data['path'])) {

        }

        return $this->render('efile', ['result' => $data]);
    }

    /**
     * 获取目录
     *
     * @return array
     */
    public function getCls()
    {

        // 初始化
        $result = array();

        $dataCls = PagesClassify::findAll(['is_using' => 'On']);

        foreach ($dataCls as $value) {
            $result[ $value['c_key'] ] = $value['name'];
        }

        return $result;
    }

    /**
     * 获取模板文件
     *
     * @return array
     */
    public function getFile()
    {

        // 初始化
        $result = array();

        $data = PagesTplFile::findAll(['is_using' => 'On']);

        foreach ($data as $value) {
            $result[ $value['path'] ] = $value['name'];
        }

        return $result;
    }

    /**
     * 设置单页面文件
     *
     * @param $path
     * @param $id
     * @return bool
     * @throws \yii\base\Exception
     */
    public function setFile($path, $id)
    {

        if (empty($path) || empty($id))
            return false;

        $path = explode(',', $path);

        $dataPath = Yii::getAlias('@backend/web/temp/pages/') . $path[0];

        // 获取模板文件
        if (!file_exists($dataPath))
            return false;

        $data = file_get_contents($dataPath);

        // 生成前台模板文件
        $filePath = Yii::getAlias('@frontend') . '/views/pages/';

        $fileName = $id . '.php';

        FileHelper::createDirectory($filePath);

        file_put_contents($filePath . $fileName, $data);

        return $fileName;
    }
}
