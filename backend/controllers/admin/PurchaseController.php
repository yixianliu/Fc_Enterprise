<?php

namespace backend\controllers\admin;


use Yii;
use common\models\Purchase;
use common\models\PurchaseSearch;
use common\models\PsbClassify;
use common\models\User;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

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
                    "imageUrlPrefix"       => Yii::$app->request->getHostInfo() . '/', // 图片访问路径前缀
                    "imagePathFormat"      => "/UEditor/purchase/{yyyy}{mm}{dd}/{time}{rand:6}", // 上传保存路径
                    "imageRoot"            => Yii::getAlias("@webroot"),
                    "imageManagerListPath" => Yii::getAlias("@web") . "/UEditor/purchase",
                ],
            ]
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
     * Creates a new Purchase model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Purchase();

        $model->purchase_id = time() . '_' . rand(0000, 9999);

        $model->user_id = '网站管理员';

        $data = $this->setDate(Yii::$app->request->post());

        // 群发短信
        $this->qSend($data);

        if ($model->load($data) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            if (!empty($model->getErrors())) {
                Yii::$app->getSession()->setFlash('error', $model->getErrors());
            }

            return $this->render('create', [
                'model'  => $model,
                'result' => [
                    'classify' => $this->getCls(),
                ],
            ]);
        }
    }

    /**
     * Updates an existing Purchase model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->start_at = date('Y - m -d', $model->start_at);

        $model->end_at = date('Y - m -d', $model->end_at);

        $data = $this->setDate(Yii::$app->request->post());

        $this->qSend($data);

        if ($model->load($data) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            if (!empty($model->getErrors())) {
                Yii::$app->getSession()->setFlash('error', $model->getErrors());
            }

            return $this->render('update', [
                'model'  => $model,
                'result' => [
                    'classify' => $this->getCls(),
                ],
            ]);
        }
    }

    /**
     * Deletes an existing Purchase model.
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
     * Finds the Purchase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Purchase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Purchase::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * 设置时间
     *
     * @param $data
     * @return array|bool
     */
    public function setDate($data)
    {
        if (empty($data) || !is_array($data)) {
            return false;
        }

        // 开始
        $data['Purchase']['start_at'] = strtotime($data['Purchase']['start_at']);

        // 结束
        $data['Purchase']['end_at'] = strtotime($data['Purchase']['end_at']);

        if ($data['Purchase']['start_at'] > $data['Purchase']['end_at']) {
            return false;
        }

        return $data;
    }

    /**
     * 群发信息
     *
     * @param $data
     * @return bool
     */
    public function qSend($data)
    {

        // 初始化
        $mobile = null;

        if (empty($data) || $data['Purchase']['is_send_msg'] != 'On') {
            return false;
        }

        $user = User::findAll(['is_type' => 'supplier']);

        if (empty($user)) {
            return false;
        }

        $content = '【湛江沃噻网络】我司发布了一条新的采购信息 : "' . $data['title'] . '"。如果符合你公司的供应货品,请致电联系我司客服进行沟通.';

        // 接收的手机号,多个手机号用英文逗号隔开
        foreach ($user as $value) {
            $mobile .= $value . ',';
        }

//        return Json::encode(Yii::$app->smser->send($mobile, $content));

        return true;
    }

    /**
     * 获取分类和版块
     *
     * @return array
     */
    public function getCls()
    {
        // 初始化
        $result = array();

        // 所有版块
        $dataCls = PsbClassify::findAll(['is_using' => 'On', 'is_type' => 'Purchase']);

        foreach ($dataCls as $value) {
            $result[ $value['c_key'] ] = $value['name'];
        }

        return $result;
    }

}
