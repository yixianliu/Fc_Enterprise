<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    // 网站根本路
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'themes/assets/plugins/pace/pace-theme-flash.css',
        'themes/assets/plugins/bootstrap/css/bootstrap.min.css',
        'themes/assets/plugins/bootstrap/css/bootstrap-theme.min.css',
        'themes/assets/fonts/font-awesome/css/font-awesome.css',
        'themes/assets/css/animate.min.css',
        'themes/assets/plugins/perfect-scrollbar/perfect-scrollbar.css',
        'themes/assets/plugins/icheck/skins/square/orange.css',
        'themes/assets/css/style.css',
        'themes/assets/css/responsive.css',
    ];

    public $js = [
        'themes/assets/js/jquery-1.11.2.min.js',
        'themes/assets/js/jquery.easing.min.js',
        'themes/assets/plugins/bootstrap/js/bootstrap.min.js',
        'themes/assets/plugins/pace/pace.min.js',
        'themes/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js',
        'themes/assets/plugins/viewport/viewportchecker.js',
        'themes/assets/plugins/icheck/icheck.min.js',
        'themes/assets/js/scripts.js',
        'themes/assets/plugins/sparkline-chart/jquery.sparkline.min.js',
        'themes/assets/js/chart-sparkline.js',
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
