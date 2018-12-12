<?php

namespace frontend\controllers;

use Yii;
use common\models\Job;
use common\models\JobApplyFor;
use common\models\Resume;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * JobController implements the CRUD actions for Job model.
 */
class JobController extends BaseController
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
                        'actions' => ['create', 'update', 'delete',],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                    [
                        'actions' => ['index', 'view', 'list'],
                        'allow'   => true,
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
     * Lists all Job models.
     * @return mixed
     */
    public function actionIndex()
    {

        $model = Job::find()->where( ['is_audit' => 'On'] );

        $dataProvider = new ActiveDataProvider( [
            'query'      => $model,
            'pagination' => [
                'pageSize' => 20,
            ],
        ] );

        return $this->render( 'index', ['dataProvider' => $dataProvider,] );
    }

    /**
     * Displays a single Job model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {

        $model = Job::findOne( ['job_id' => $id, 'is_audit' => 'On'] );

        // 判断该用户是否存在简历
        $modelResume = !Yii::$app->user->isGuest ? Resume::findOne( ['user_id' => Yii::$app->user->identity->user_id] ) : null;

        if (empty( $modelResume ))
            $modelResume = new Resume();

        // User Id
        $modelResume->user_id = !Yii::$app->user->isGuest ? Yii::$app->user->identity->user_id : null;

        if (Yii::$app->request->isPost) {

            //创建事务
            $tr = Yii::$app->db->beginTransaction();

            // 没有简历的情况下,添加
            if (empty( $modelResume->title )) {

                if ($modelResume->load( Yii::$app->request->post() )) {

                    if (!$modelResume->save()) {

                        $tr->rollBack();

                        Yii::$app->getSession()->setFlash( 'error', '已存在相关简历 !!' );

                        return $this->redirect( ['view', 'id' => $model->job_id] );
                    }

                }
            }

            // 写进关联数据库 (Job)
            $Cls = new JobApplyFor();

            $Cls->job_id = $model->job_id;
            $Cls->user_id = $modelResume->user_id;

            // 写入关联数据库
            if ($Cls->save()) {

                $tr->commit();

                Yii::$app->getSession()->setFlash( 'success', '投递简历成功 !!' );

                return $this->redirect( ['index'] );
            }

            Yii::$app->getSession()->setFlash( 'error', '投递简历失败 !!' );

        }

        $result = JobApplyFor::findByOne( $modelResume->user_id, $model->job_id );

        if (empty( $model ))
            return $this->redirect( ['index'] );

        return $this->render( 'view', [
            'model'       => $model,
            'modelResume' => $modelResume,
            'result'      => $result,
        ] );
    }

    /**
     * Creates a new Job model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Job();

        $model->job_id = time() . '_' . rand( 0000, 9999 );

        $model->user_id = Yii::$app->user->identity->user_id;

        if (!empty( $model->getErrors() )) {
            Yii::$app->getSession()->setFlash( 'error', $model->getErrors() );
        }

        if ($model->load( Yii::$app->request->post() ) && $model->save()) {

            return $this->redirect( ['user/index'] );

        } else {

            return $this->render( 'create', [
                'model' => $model,
            ] );

        }
    }

    /**
     * 更改简历
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate()
    {

        $id = Yii::$app->request->get( 'id', null );

        $model = Resume::findOne( ['user_id' => $id] );

        if (empty( $model )) {
            return $this->redirect( ['job/create'] );
        } // 简历 id 和用户 id无法对应
        else {
            if ($model->user_id != Yii::$app->user->identity->user_id) {
                return $this->redirect( ['index'] );
            }
        }

        if ($model->load( Yii::$app->request->post() ) && $model->save()) {

            Yii::$app->getSession()->setFlash( 'success', '修改简历成功 !!' );

            return $this->redirect( ['user/index'] );

        } else {

            return $this->render( 'update', [
                'model' => $model,
            ] );

        }
    }

    /**
     * Deletes an existing Job model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        throw new NotFoundHttpException( 'The requested page does not exist. ' . $id );
        $this->findModel( $id )->delete();

        return $this->redirect( ['index'] );
    }

    /**
     * Finds the Job model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Job the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Job::findOne( $id )) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException( 'The requested page does not exist.' );
        }
    }
}
