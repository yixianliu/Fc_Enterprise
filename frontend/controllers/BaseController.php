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

use common\models\Menu;
use function GuzzleHttp\Promise\all;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use common\models\Conf;

class BaseController extends Controller
{

    // 布局
    public $layout = 'qijian';

    // 构造
    public function init()
    {

        parent::init();

        $web = Yii::getAlias('@web');

        Yii::setAlias('@web', $web . '/frontend/web');

        $session = Yii::$app->session;

        if (!$session->has('language')) {

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
     * @return void|\yii\web\Response
     */
    public function isUser()
    {

        if (Yii::$app->user->isGuest) {
            echo '<script language="javascript" type="text/javascript">window.location.href="' . Url::to(['/member/login']) . '"; </script> ';
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
                    "imagePathFormat"      => "/UEditor/temp/{yyyy}{mm}{dd}/{time}{rand:6}", // 上传保存路径
                    "imageRoot"            => Yii::getAlias("@webroot"),
                    "imageManagerListPath" => Yii::getAlias("@web") . "/UEditor/product",
                ],
            ]
        ];
    }

    /**
     * 左边的侧边栏的内容
     *
     * @param null $system
     * @return array
     */
    public static function WebConf($system = null)
    {

        // 初始化
        $result = array();

        if (empty($system)) {
            $confData = Conf::findByData('On', Yii::$app->session['language']);
        } else {
            $confData = Conf::find()->where(['is_using' => 'On', 'is_language' => ''])->asArray()->all();
        }

        if (!empty($confData)) {

            foreach ($confData as $key => $value) {
                $result[ $value['c_key'] ] = $value['parameter'];
            }

        }

        return $result;
    }

    /**
     * 底部菜单链接
     *
     * @return string
     */
    public static function footConf()
    {

        // 底部菜单
        $result = Menu::findByAll(Menu::$frontend_parent_id, Yii::$app->session['language']);

        return $result;
    }

}