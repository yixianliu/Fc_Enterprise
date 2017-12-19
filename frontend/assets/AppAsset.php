<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    // css
    public $css = [
        'themes/enterprise/css/bootstrap.min.css',
        'themes/enterprise/css/magnific-popup.css',
        'themes/enterprise/css/font-icons.css',
        'themes/enterprise/revolution/css/settings.css',
        'themes/enterprise/css/rev-slider.css',
        'themes/enterprise/css/sliders.css',
        'themes/enterprise/css/style.css',
        'themes/enterprise/css/responsive.css',
        'themes/enterprise/css/spacings.css',
        'themes/enterprise/css/animate.css',
        'themes/enterprise/css/color.css',
    ];

    // js
    public $js = [
        'themes/enterprise/js/jquery.min.js',
        'themes/enterprise/js/bootstrap.min.js',
        'themes/enterprise/js/plugins.js',
        'themes/enterprise/js/scripts.js',
    ];

    // Js在顶部加载
    // $this->registerJsFile('xxx.js',['positon' => $this::POS_HEAD]); 加载单个Js文件
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
