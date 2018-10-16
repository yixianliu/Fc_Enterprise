<?php
/**
 *
 * 前台配置控制器
 *
 * Created by Yixianliu.
 * User: Yxl <zccem@163.com>
 * Date: 2017/6/18
 * Time: 15:57
 */

namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use common\models\Language;

class BaseController extends Controller
{

    // 布局
    public $layout = 'default';

    // 构造
    public function init()
    {

        // 判断访问模式
        if (static::isMobile()) {
            echo '<script language="javascript" type="text/javascript">window.location.href="' . Url::to( ['/mobile/center/index'] ) . '"; </script> ';
            exit( false );
        }

        // 多语言
        if (!Yii::$app->session->has( 'language' )) {
            Yii::$app->session->set( 'language', Language::findByAll() );
        }

        Yii::$app->language = Yii::$app->session['language'];

        // 重置 @web 路径
        Yii::setAlias('@web', '@web/frontend/web');

        Yii::$app->view->params['ConfArray'] = \common\models\Conf::findByConfArray( Language::$default_key, 'On' );

        // 菜单MID
        $id = Yii::$app->request->get( 'mid', null );

        if (!empty( $id )) {
            Yii::$app->view->params['MenuArray'] = \common\models\Menu::findByOne( $id );
        }

        return true;
    }

    /**
     * 判断用户
     *
     * @return bool
     */
    public function isUser()
    {

        if (Yii::$app->user->isGuest) {
            echo '<script language="javascript" type="text/javascript">window.location.href="' . Url::to( ['/member/login'] ) . '"; </script> ';
            exit( false );
        }

        return true;
    }

    /**
     * @return array
     */
    public function actions()
    {
        return [

            // 错误
            'error'  => [
                'class' => 'yii\web\ErrorAction',
            ],

            // 上传
            'upload' => [
                'class'  => 'kucha\ueditor\UEditorAction',
                'config' => [
                    "imageUrlPrefix"       => Yii::$app->request->getHostInfo() . '/', // 图片访问路径前缀
                    "imagePathFormat"      => "/UEditor/{yyyy}{mm}{dd}/{time}{rand:6}", // 上传保存路径
                    "imageRoot"            => Yii::getAlias( "@webroot" ),
                    "imageManagerListPath" => Yii::getAlias( "@web" ) . "/UEditor",
                ],
            ],
        ];
    }

    /**
     * 随机生成关键KEY
     *
     * @param      $len
     * @param null $chars
     *
     * @return string
     */
    public static function getRandomString($len = 4, $chars = null)
    {

        if (is_null( $chars )) {
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        }

        mt_srand( 10000000 * (double)microtime() );

        for ($i = 0, $str = '', $lc = strlen( $chars ) - 1; $i < $len; $i++) {
            $str .= $chars[ mt_rand( 0, $lc ) ];
        }

        $str = $str . '_' . time() . '_' . rand( 0000, 9999 );

        return $str;
    }

    public static function isMobile()
    {

        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset( $_SERVER['HTTP_X_WAP_PROFILE'] )) {
            return true;
        }

        // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset( $_SERVER['HTTP_VIA'] )) {
            // 找不到为flase,否则为true
            return stristr( $_SERVER['HTTP_VIA'], "wap" ) ? true : false;
        }

        // 脑残法，判断手机发送的客户端标志,兼容性有待提高。其中'MicroMessenger'是电脑微信
        if (isset( $_SERVER['HTTP_USER_AGENT'] )) {
            $clientkeywords = ['nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile', 'MicroMessenger'];
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match( "/(" . implode( '|', $clientkeywords ) . ")/i", strtolower( $_SERVER['HTTP_USER_AGENT'] ) )) {
                return true;
            }
        }

        // 协议法，因为有可能不准确，放到最后判断
        if (isset ( $_SERVER['HTTP_ACCEPT'] )) {
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos( $_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml' ) !== false) && (strpos( $_SERVER['HTTP_ACCEPT'], 'text/html' ) === false || (strpos( $_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml' ) < strpos( $_SERVER['HTTP_ACCEPT'], 'text/html' )))) {
                return true;
            }
        }

        return false;
    }
}