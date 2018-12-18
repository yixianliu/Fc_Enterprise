<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/12/18
 * Time: 15:44
 */
namespace backend\controllers\admin;

use Yii;
use backend\models\SeoForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ResumeController implements the CRUD actions for Resume model.
 */
class SeoController extends BaseController
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

    public function actionJs()
    {

        $frontFile = Yii::getAlias('@frontend/views/_SeoFile.php');

        if (!file_exists($frontFile)) {
            Yii::$app->getSession()->setFlash( 'error', '前端没有生成Seo文件!' );
        }

        $model = new SeoForm();

        return $this->render('js', ['model' => $model]);
    }

    public function actionJsTpl()
    {

        $frontFile = Yii::getAlias('@webroot/../views/_SeoTpl.php');

        if (!file_exists($frontFile)) {
            Yii::$app->getSession()->setFlash( 'error', '后端Seo文件模板已丢失!' );
        }

        if (Yii::$app->request->isPost) {

            // htmlspecialchars_decode 解码

        }

        $model = new SeoForm();

        // 转义
        $model->content = htmlspecialchars(file_get_contents($frontFile));

        return $this->render('js', ['model' => $model]);
    }
}