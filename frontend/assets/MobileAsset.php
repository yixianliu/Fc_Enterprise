<?php
/**
 *
 * 第七建筑手机版的CSS和JS
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/6/20
 * Time: 9:43
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MobileAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    // css
    public $css = [
        'frontend/web/themes/qijian/mobile/styles/style.css',
        'frontend/web/themes/qijian/mobile/styles/framework.css',
        'frontend/web/themes/qijian/mobile/styles/font-awesome.css',
        'frontend/web/themes/qijian/mobile/styles/animate.css',
    ];

    // js
    public $js = [
        'frontend/web/themes/qijian/mobile/scripts/jquery.js',
        'frontend/web/themes/qijian/mobile/scripts/jqueryui.js',
        'frontend/web/themes/qijian/mobile/scripts/framework-plugins.js',
        'frontend/web/themes/qijian/mobile/scripts/custom.js',
    ];

    // Js在顶部加载
    // $this->registerJsFile('xxx.js',['positon' => $this::POS_HEAD]); 加载单个Js文件
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD,
    ];

    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];

}