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
                        // 设置 actions 的操作是允许访问还是拒绝访问
                        'allow' => true,
                        // @ 当前规则针对认证过的用户， ？所有用户均可访问
                        'roles' => ['@'],
                    ],
                ],
            ],

            'verbs' => [
                'class'   => VerbFilter::className(),
                //VerbFilter指定CRUD动作所允许的请求方式
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],

        ];
    }

    /**
     * 首页
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render( 'index' );
    }



    /**
     * 设置管理员密码
     *
     * @return string
     */
    public function actionSetpassword()
    {
        return $this->render( 'setpassword' );
    }

    /**
     * 网站内容
     *
     * @return string
     */
    public function actionInfo()
    {

        // 初始化
        $result = [];

        $confData = Conf::findByData( null, Yii::$app->session['language'] );

        if (!empty( $confData )) {
            foreach ($confData as $key => $value) {
                $result[ $value['c_key'] ] = $value['parameter'];
            }
        }

        return $this->render( 'info', ['result' => $result] );
    }

    /**
     * SEO设置
     *
     * @return string
     */
    public function actionSeo()
    {

        // 初始化
        $result = [];

        if (Yii::$app->request->isPost) {

        }

        $confData = Conf::findByData( null, Yii::$app->session['language'] );

        if (!empty( $confData )) {
            foreach ($confData as $key => $value) {
                $result[ $value['c_key'] ] = $value['parameter'];
            }
        }

        $model = new \backend\models\SeoForm();

        return $this->render( 'seo', ['result' => $result, 'model' => $model] );
    }

    /**
     * 语言设置
     *
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionLanguage()
    {

        $type = Yii::$app->request->get( 'type', 'cn' );

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
            throw new NotFoundHttpException( '请联系网站管理员, Session 功能有误 !!' );
        }

        // 开启session
        $session->open();

        // 设置一个session变量，以下用法是相同的：
        $session->set( 'language', $type );
        $session->set( 'language_name', $result );

        return $this->redirect( Yii::$app->request->referrer );
    }

    public function actionError()
    {

        $exception = Yii::$app->errorHandler->exception;

        if ($exception !== null) {
            return $this->render( 'error', ['exception' => $exception] );
        }
    }

}
