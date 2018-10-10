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
use common\models\Conf;
use common\models\Menu;

class BaseController extends Controller
{

    // 布局
    public $layout = 'default';

    // 构造
    public function init()
    {

        parent::init();

        $web = Yii::getAlias('@web');

        Yii::setAlias('@web', $web . '/frontend/web');

        $session = Yii::$app->session;

        if ( !$session->has('language') ) {

            // 设置一个session变量，以下用法是相同的：
            $session->set('language', 'cn');
        }

        switch ($session->get('language')) {

            default:
            case 'cn':
                Yii::$app->language = 'zh-CN';
                break;

            case 'en':
                Yii::$app->language = 'en-US';
                break;

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

        if ( Yii::$app->user->isGuest ) {
            echo '<script language="javascript" type="text/javascript">window.location.href="' . Url::to([ '/member/login' ]) . '"; </script> ';
            exit(false);
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
                    "imageRoot"            => Yii::getAlias("@webroot"),
                    "imageManagerListPath" => Yii::getAlias("@web") . "/UEditor",
                ],
            ],
        ];
    }

    /**
     * 左边的侧边栏的内容
     *
     * @param null $system
     *
     * @return array
     */
    public static function WebConf($system = null)
    {
        return (empty($system)) ? Conf::findByData('On', Yii::$app->session[ 'language' ]) : Conf::findByConfArray(Yii::$app->session[ 'language' ]);
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

        if ( is_null($chars) ) {
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        }

        mt_srand(10000000 * (double)microtime());

        for ($i = 0, $str = '', $lc = strlen($chars) - 1; $i < $len; $i++) {
            $str .= $chars[ mt_rand(0, $lc) ];
        }

        $str = $str . '_' . time() . '_' . rand(0000, 9999);

        return $str;
    }

    /**
     * 底部菜单链接
     *
     * @return string
     */
    public static function footConf()
    {

        // 底部菜单
        $result = Menu::findByAll(Menu::$frontend_parent_id, Yii::$app->session[ 'language' ]);

        return $result;
    }

}