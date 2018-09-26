<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/9/26
 * Time: 10:38
 */

namespace backend\controllers\admin;

use Yii;
use common\models\Conf;
use backend\models\ConfSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CenterController implements the CRUD actions for Conf model.
 */
class ConfController extends BaseController
{

    /**
     * 网站配置
     *
     * @return string
     */
    public function actionIndex()
    {

        $searchModel = new ConfSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, Yii::$app->request->get('type', Conf::$webDefault));

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'type'         => Yii::$app->request->get('type', Conf::$webDefault),
        ]);
    }

    /**
     * Displays a single Conf model.
     *
     * @param integer $id
     *
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

        if ( $model->load(Yii::$app->request->post()) && $model->save() ) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'type'  => Yii::$app->request->get('type', 'cn'),
        ]);
    }

    /**
     * Updates an existing Conf model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ( $model->load(Yii::$app->request->post()) && $model->save() ) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'type'  => Yii::$app->request->get('type', Conf::$webDefault),
        ]);
    }

    /**
     * Deletes an existing Conf model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ( $model->is_language == '' )
            return $this->redirect(['/admin/center/conf', 'type' => 'system']);

        $model->delete();

        return $this->redirect(['/admin/center/conf']);
    }

    /**
     * Finds the Conf model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Conf the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if ( ($model = Conf::findOne($id)) !== null ) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}