<?php
/**
 *
 * 用户登录控制器
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/12
 * Time: 11:12
 */

namespace frontend\controllers\mobile;

use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\web\Controller;
use common\models\User;

class MemberController extends Controller
{

    public $layout = 'mobile';

    // 构造
    public function init()
    {

        parent::init();

        if (!file_exists( Yii::getAlias( '@backend' ) . '/web/' . Yii::$app->params['RD_FILE'] )) {
            exit( null );
        }

        if (!Yii::$app->user->isGuest) {
            return $this->redirect( ['/mobile/user/index'] );
        }

        return;
    }

    /**
     * 登录
     *
     * @return string
     */
    public function actionLogin()
    {

        $model = new User();

        $model->scenario = 'login';

        if ($model->load( Yii::$app->request->post() )) {

        }

        return $this->render( '../center/login', ['model' => $model] );
    }

    /**
     * 注册
     */
    public function actionReg()
    {

        $model = new User();

        $model->scenario = 'reg';

        if (Yii::$app->request->isPost) {

            if (!$model->load( Yii::$app->request->post() ) || !$model->validate()) {
                Yii::$app->getSession()->setFlash( 'error', $model->getErrors() );
            }

            $cookie = \Yii::$app->request->cookies;

            //判断cookie是否存在
            if (!$cookie->has( 'RegPhoneCode' )) {
                Yii::$app->getSession()->setFlash( 'error', '没有验证手机 !!' );
            } else {

                if ($model->msg != $cookie->get( 'RegPhoneCode' )) {
                    Yii::$app->getSession()->setFlash( 'error', '与验证手机的验证码不一致 !!' );
                } else {

                    if (!($user = $model->userReg())) {
                        Yii::$app->getSession()->setFlash( 'error', '注册失败,请检查 !!' );
                    }

                    if (!Yii::$app->getUser()->login( $model->getUser(), (3600 * 24 * 30) )) {
                        Yii::$app->getSession()->setFlash( 'error', '无法保存时间 !!' );
                    }

                    if (!Yii::$app->user->isGuest) {
                        return $this->redirect( ['/user/index'] );
                    }
                }

            }

        }

        return $this->render( '../center/reg', ['model' => $model] );
    }

    /**
     * 注销用户
     *
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->getSession()->destroy();

        return $this->goHome();
    }

    /**
     * 发送短信接口
     *
     * @return string
     * @throws \yii\base\Exception
     */
    public function actionSend()
    {

        if (!Yii::$app->request->isAjax) {
            return Json::encode( ['msg' => '提交方式有误 !!'] );
        }

        $data = Yii::$app->request->post();

        if (empty( $data['username'] )) {
            return Json::encode( ['msg' => '手机号码不正确 !!'] );
        }

        // 验证码
        $code = rand( 10000, 99999 );

        // cookie
        $cookie = new \yii\web\Cookie( [
            'name'     => 'RegPhoneCode',
            'value'    => $code,
            'expire'   => time() + 18000,
            'httpOnly' => true,
        ] );

        \Yii::$app->response->getCookies()->add( $cookie );

        // 短信模板
        $content = '【湛江沃噻网络】您的验证码是' . $code . '。如非本人操作，请忽略本短信';

        FileHelper::createDirectory( Yii::getAlias( '@frontend/web/temp/' ) . $code );

        return Json::encode( true );
//        return Json::encode(Yii::$app->smser->send($data['username'], $content));
    }

}