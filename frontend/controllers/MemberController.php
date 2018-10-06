<?php

/**
 * @abstract 用户登录控制器
 * @author   Yxl <zccem@163.com>
 */

namespace frontend\controllers;

use Yii;
use yii\helpers\Json;
use common\models\User;

class MemberController extends BaseController
{

    // 构造
    public function init()
    {

        parent::init();

        if (!file_exists( Yii::getAlias( '@backend' ) . '/web/' . Yii::$app->params['RD_FILE'] )) {
            exit( 'Null' );
        }

        if (!Yii::$app->user->isGuest) {
            return $this->redirect( ['/user/index'] );
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

            if (!$model->login()) {
                Yii::$app->getSession()->setFlash( 'error', '帐号密码有误 !!' );
            } else {
                return $this->redirect( ['/user/index'] );
            }

            $model->password = null;
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
            } else {
                $session = Yii::$app->session;

                //判断 Session 是否存在
                if ($session->has( 'RegPhoneCode' )) {

                    Yii::$app->getSession()->setFlash( 'error', '没有验证手机 !!' );

                } else {

                    // 验证手机验证码
                    if ($model->msg == $session->get( 'RegPhoneCode' )) {

                        Yii::$app->getSession()->setFlash( 'error', '与验证手机的验证码不一致 !!' );

                    } else {

                        // 插入数据
                        if (!($user = $model->userReg())) {
                            Yii::$app->getSession()->setFlash( 'error', '注册失败,请检查 !!' );
                        }

                        if (!Yii::$app->getUser()->login( $model->getUser(), (3600 * 24 * 30) )) {
                            Yii::$app->getSession()->setFlash( 'error', '无法保存时间 !!' );
                        }

                        if (!Yii::$app->user->isGuest) {
                            return $this->redirect( ['/user/index'] );
                        }

                        Yii::$app->getSession()->setFlash( 'error', '注册异常 !!' );
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

        return $this->redirect( ['/center/index'] );
    }

    /**
     * 发送短信
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

        $session = Yii::$app->session;

        // 检查session是否开启
        if ($session->isActive) {
            return Json::encode( ['msg' => '服务器异常 !!'] );
        }

        // 开启session
        $session->open();

        $session->set( 'RegPhoneCode', $code );

        // 短信模板
        $content = '【湛江沃噻网络】您的验证码是' . $code . '。如非本人操作，请忽略本短信';

        return Json::encode( ['msg' => $content, 'status' => true] );
//        return Json::encode(Yii::$app->smser->send($data['username'], $content));
    }

}
