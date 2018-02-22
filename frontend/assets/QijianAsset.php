<?php
/**
 *
 * 第七建筑的CSS和JS
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/2/5
 * Time: 9:14
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class QijianAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    // css
    public $css = [
        'themes/qijian/css/bootstrap.css',
        'themes/qijian/css/bootstrap-theme.css',
        'themes/qijian/css/style.css',
        'themes/qijian/css/nav.css',
    ];

    // js
    public $js = [
        'themes/qijian/js/jquery.js',
        'themes/qijian/js/bootstrap.js',
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