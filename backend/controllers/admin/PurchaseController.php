<?php

namespace backend\controllers\admin;

use common\models\SpOffer;
use Yii;
use common\models\Purchase;
use common\models\PurchaseSearch;
use common\models\PsbClassify;
use common\models\User;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * PurchaseController implements the CRUD actions for Purchase model.
 */
class PurchaseController extends BaseController
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
     * Lists all Purchase models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PurchaseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Purchase model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {

        $model = $this->findModel($id);

        // 价格
        $result['offer'] = new ActiveDataProvider([
            'query'      => SpOffer::find()->where(['offer_id' => $model->purchase_id]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('view', [
            'model'  => $model,
            'result' => $result,
        ]);
    }

    /**
     * Creates a new Purchase model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Purchase();

        $model->user_id = '网站管理员';

        $data = Yii::$app->request->post();

        if (!empty($data)) {
            if (!($data = static::setDate($data)))
                Yii::$app->getSession()->setFlash('error', '时间设置有误 !!');
        }

        // 旧路径
        $oldFile = $model->path;

        if ($model->load($data) && $model->save()) {

            // 群发短信
            PsbClassify::smsSend($data);

            self::ImageDelete($model->path, $oldFile, $model->purchase_id);

            return $this->redirect(['view', 'id' => $model->id]);

        }

        if (!empty($model->getErrors())) {
            Yii::$app->getSession()->setFlash('error', $model->getErrors());
        }

        $model->purchase_id = self::getRandomString();

        return $this->render('create', [
            'model'  => $model,
            'result' => [
                'classify' => PsbClassify::getClsSelect(PsbClassify::$parent_cly_id['Purchase'], 'Purchase', 'Off'),
            ],
        ]);
    }

    /**
     * Updates an existing Purchase model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        $data = Yii::$app->request->post();

        if (!empty($data)) {
            if (!($data = static::setDate($data)))
                Yii::$app->getSession()->setFlash('error', '时间设置有误 !!');
        }

        // 旧路径
        $oldFile = $model->path;

        if ($model->load($data) && $model->save()) {

            PsbClassify::smsSend($data);

            self::ImageDelete($model->path, $oldFile, $model->purchase_id);

            return $this->redirect(['view', 'id' => $model->id]);

        }

        if (!empty($model->getErrors())) {
            Yii::$app->getSession()->setFlash('error', $model->getErrors());
        }

//        $model->start_at = date('Y-m-d H:i', $model->start_at);
//        $model->end_at = date('Y-m-d H:i', $model->end_at);

        return $this->render('update', [
            'model'  => $model,
            'result' => [
                'classify' => PsbClassify::getClsSelect(PsbClassify::$parent_cly_id['Purchase'], 'Purchase', 'Off'),
            ],
        ]);
    }

    /**
     * Deletes an existing Purchase model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Purchase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Purchase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Purchase::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('无法找到相关网页.');
        }
    }

    /**
     * 设置时间
     *
     * @param $data
     *
     * @return bool
     */
    public static function setDate($data)
    {

        if (empty($data['Purchase']))
            return false;

//        $data['Purchase']['start_at'] = strtotime($data['Purchase']['start_at']);
//        $data['Purchase']['end_at'] = strtotime($data['Purchase']['end_at']);

        return $data;
    }

}
