<?php

namespace backend\controllers\admin;

use Yii;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\BackUpForm;

class BackupController extends BaseController
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

    public function actionIndex()
    {
        $model = new BackUpForm();

        $dataProvider = $model->getSqlFiles();

        return $this->render('/admin/center/backup', ['dataProvider' => $dataProvider]);
    }

    /**
     * 查看数据库文件内容
     *
     * @return string
     */
    public function actionView()
    {

        $id = Yii::$app->request->get('id', null);

        $file = Yii::getAlias('@webroot') . '/' . BackUpForm::$DbData_Path . '/' . $id;

        $content = file_get_contents($file);

        return $this->render('/admin/center/backup-view', ['content' => $content]);
    }

    /**
     * 备份数据库
     *
     * @return array
     */
    public function actionBackupSql()
    {

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if (!Yii::$app->request->isAjax) {
            return [
                'status' => false,
                'msg'    => '异常提交!!'
            ];
        }

        $model = new BackUpForm();

        $model->backUp();

        return Yii::$app->response->data = [
            'status' => true,
            'msg'    => '备份数据库成功!!',
            'url'    => Url::to(['admin/backup']),
        ];
    }

}
