<?php
/**
 *
 * 挂载布局模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/10/16
 * Time: 17:28
 */

use yii\helpers\Url;
use yii\helpers\Html;
use backend\assets\AppAsset;

AppAsset::register($this); // $this 代表视图对象

$this->beginPage();

?>

<!DOCTYPE html>
<html class=" ">
<head>

    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <title><?= Yii::$app->params['NAME'] ?> - <?= Yii::$app->params['TITLE'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <?= Html::csrfMetaTags() ?>

    <?php $this->head() ?>

</head>
<body class=" ">

<?php $this->beginBody() ?>

<div class='page-topbar '>
    <div class='logo-area'></div>
    <div class='quick-area'>
        <div class='pull-left'>
            <ul class="info-menu left-links list-inline list-unstyled">

                <li class="sidebar-toggle-wrap">
                    <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>

            </ul>
        </div>
        <div class='pull-right'>
            <ul class="info-menu right-links list-inline list-unstyled">

                <li class="profile">
                    <a href="#" data-toggle="dropdown" class="toggle">
                        <?= Html::img(Url::to('@web/themes/data/profile/profile.png'), ['class' => 'img-circle img-inline']); ?>
                    </a>
                </li>

            </ul>
        </div>
    </div>

</div>

<div class="page-container row-fluid">
    <div class="page-sidebar ">
        <div class="page-sidebar-wrapper" id="main-menu-wrapper">
            <div class="profile-info row">

                <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                    <a href="#">
                        <?= Html::img(Url::to('@web/themes/data/profile/profile.png'), ['class' => 'img-responsive img-circle']); ?>
                    </a>
                </div>

                <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                    <h3>
                        <a href="#"><?= Yii::$app->session->get('MountSession')['Username'] ?></a>

                        <!-- Available statuses: online, idle, busy, away and offline -->
                        <span class="profile-status online"></span>
                    </h3>

                    <p class="profile-title"><?= Yii::$app->formatter->asTime(Yii::$app->session->get('MountSession')['time']) ?></p>

                </div>

            </div>

            <ul class='wraplist'>

                <li class="open">
                    <a href="<?= Url::to(['mount/center/view']) ?>"><i class="fa fa-dashboard"></i><span class="title">首页</span></a>
                </li>

                <li class="">
                    <a href="<?= Url::to(['mount/center/run']) ?>"><i class="fa fa-th"></i><span class="title">1. 挂载中心</span></a>
                </li>

                <li class="">
                    <a href="<?= Url::to(['mount/center/setpower']) ?>"><i class="fa fa-th"></i><span class="title">2. 设置权限</span></a>
                </li>

                <li class="">
                    <a href="<?= Url::to(['mount/member/logout']) ?>"><i class="fa fa-th"></i><span class="title">注销</span></a>
                </li>

            </ul>

        </div>
    </div>

    <section id="main-content" class="">
        <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
            <?= $content ?>
        </section>
    </section>

</div>

<?php $this->endBody(); ?>

</body>
</html>

<?php $this->endPage() ?>

