<?php

namespace backend\controllers\admin;

use Yii;
use common\models\Conf;
use common\models\ConfSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CenterController implements the CRUD actions for Conf model.
 */
class CenterController extends BaseController
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
     * Displays a single Conf model.
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
     * Creates a new Conf model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Conf();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Conf model.
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
            'model' => $model,
        ]);
    }

    /**
     * 首页
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 网站配置
     *
     * @return string
     */
    public function actionConf()
    {

        $searchModel = new ConfSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, Yii::$app->request->get('type', 'cn'));

        return $this->render('conf', ['dataProvider' => $dataProvider]);
    }

    /**
     * 设置管理员密码
     *
     * @return string
     */
    public function actionSetpassword()
    {
        return $this->render('setpassword');
    }

    /**
     * Deletes an existing Conf model.
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
     * Finds the Conf model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Conf the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Conf::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionInfo()
    {
        return $this->render('info');
    }

    public function actionSeo()
    {
        return $this->render('seo');
    }


    public function actionLanguage()
    {

        $type = Yii::$app->request->get('type', 'cn');

        switch ($type) {

            default:
            case 'cn':
                $result = '中文版';
                break;

            case 'en':
                $result = '英文版';
                break;
        }

        $session = Yii::$app->session;

        // 检查session是否开启
        if (!$session->isActive) {
            throw new NotFoundHttpException('请联系网站管理员, Session 功能有误 !!');
        }

        // 开启session
        $session->open();

        // 设置一个session变量，以下用法是相同的：
        $session->set('language', $type);
        $session->set('language_name', $result);

        return $this->redirect(Yii::$app->request->referrer);
    }
}
