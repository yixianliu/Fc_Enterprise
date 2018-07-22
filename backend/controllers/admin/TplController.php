<?php
/**
 *
 * 模板管理
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/6/1
 * Time: 10:06
 */

namespace backend\controllers\admin;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\TplForm;

/**
 * DownloadController implements the CRUD actions for Download model.
 */
class TplController extends BaseController
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

        // 前台模板目录
        $dir = Yii::$app->basePath . '/../frontend/views/';

        // 获取文件
        $result = TplForm::getFiles($dir, true);

        return $this->render('/admin/center/tpl', ['result' => $result]);
    }

    /**
     * 编辑模板文件
     *
     * @return string
     */
    public function actionEdit()
    {

        $model = new TplForm();

        $model->fileName = Yii::$app->request->get('id', null);

        $model->path = Yii::$app->request->get('path', null);

        // 保存
        if ($model->load(Yii::$app->request->post())) {

            $file = Yii::$app->basePath . '/../frontend/views/default/' . $model->path . '/' . $model->fileName;

            if (!file_put_contents($file, $model->content)) {
                Yii::$app->getSession()->setFlash('error', '保存内容失败 !!');
            }

            Yii::$app->getSession()->setFlash('success', '保存内容成功 !!');

            return $this->redirect(['/admin/tpl/index']);
        }

        $file = Yii::$app->basePath . '/../frontend/views/default/' . $model->path . '/' . $model->fileName;

        if (!is_file($file)) {
            Yii::$app->getSession()->setFlash('error', '此文件不存在 !!');
        } else {
            $model->content = file_get_contents($file);
        }

        return $this->render('/admin/center/editTpl', ['model' => $model]);
    }

}