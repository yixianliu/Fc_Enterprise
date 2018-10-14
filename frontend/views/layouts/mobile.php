<?php
/**
 *
 * 手机版布局模版
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/12
 * Time: 11:09
 */

use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\MobileAsset;
use common\models\Menu;
use common\widgets\iConf\ConfList;

// $this 代表视图对象
MobileAsset::register( $this );

$this->beginPage();

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>

    <?= Yii::$app->view->renderFile( '@app/views/default/_head.php' ); ?>

    <?php $this->head() ?>

</head>

<body class="dual-sidebar">

<?php $this->beginBody() ?>


<div id="preloader">
    <div id="status">
        <div class="preloader-logo"></div>
        <h3 class="center-text">Welcome,weidea.net</h3>
        <p class="center-text smaller-text">
            We're loading the content, give us a second. This won't take long!
        </p>
    </div>
</div>

<div class="gallery-fix"></div> <!-- Important for all pages that have galleries or portfolios -->

<div id="header-fixed">
    <a class="open-left-sidebar" href="#"><i class="fa fa-navicon"></i></a>
    <a class="header-logo" href="index.html"></a>
    <a class="open-right-sidebar" href="#"><i class="fa fa-envelope-o"></i></a>
</div>

<!-- Ball Footer Menu -->

<div class="footer-menu">
    <a href="#" class="footer-menu-open">
        <i class="fa fa-ellipsis-v"></i>
    </a>
    <a href="#" class="footer-menu-close">
        <em href="#" class="footer-menu-open-text">Navigation</em>
        <i class="bg-red-dark fa fa-times"></i>
    </a>
    <a href="list-features.html" class="footer-menu-item fm-1">
        <em>Features</em>
        <i class="bg-orange-dark fa fa-cog"></i>
    </a>
    <a href="list-gallery.html" class="footer-menu-item fm-2">
        <em>Media</em>
        <i class="bg-magenta-dark fa fa-camera"></i>
    </a>
    <a href="list-portfolio.html" class="footer-menu-item fm-3">
        <em>Pages</em>
        <i class="bg-green-dark fa fa-picture-o"></i>
    </a>
    <a href="list-features.html" class="footer-menu-item fm-4">
        <em>App Styled</em>
        <i class="bg-blue-dark fa fa-mobile"></i>
    </a>
    <a href="contact.html" class="footer-menu-item fm-5">
        <em>Contact Us</em>
        <i class="bg-night-dark fa fa-envelope-o"></i>
    </a>
</div>

<div class="menu-background"></div>

<?= $content ?>

<?php $this->endBody(); ?>

</body>
</html>

<?php $this->endPage() ?>
