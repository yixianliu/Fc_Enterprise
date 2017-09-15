<?php

/**
 * @abstract 后台布局
 * @author   Yxl <zccem@163.com>
 */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);

?>

<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html class=" " lang="<?= Yii::$app->language; ?>">
<head>

    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <title><?= Html::encode($this->title); ?> - <?= Yii::$app->params['NAME']; ?>
        - <?= Yii::$app->params['TITLE']; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="description" name="<?= Yii::$app->params['DESCRIPTION']; ?>"/>
    <meta content="author" name="<?= Yii::$app->params['COPYRIGHT']; ?>"/>

    <link rel="shortcut icon" href="<?= Yii::getAlias("@web") ?>/web/favicon.ico" type="image/x-icon"/>
    <!-- Favicon -->

    <link rel="apple-touch-icon-precomposed"
          href="<?= Yii::getAlias("@web") ?>/themes/backend/assets/images/apple-touch-icon-57-precomposed.png">
    <!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="<?= Yii::getAlias("@web") ?>/themes/backend/assets/images/apple-touch-icon-114-precomposed.png"/>
    <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="<?= Yii::getAlias("@web") ?>/themes/backend/assets/images/apple-touch-icon-72-precomposed.png"/>
    <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="<?= Yii::getAlias("@web") ?>/themes/backend/assets/images/apple-touch-icon-144-precomposed.png"/>

    <?= Html::cssFile('@web/themes/backend/assets/plugins/pace/pace-theme-flash.css') ?>
    <?= Html::cssFile('@web/themes/backend/assets/plugins/bootstrap/css/bootstrap.min.css') ?>
    <?= Html::cssFile('@web/themes/backend/assets/plugins/bootstrap/css/bootstrap-theme.min.css') ?>
    <?= Html::cssFile('@web/themes/backend/assets/fonts/font-awesome/css/font-awesome.css') ?>
    <?= Html::cssFile('@web/themes/backend/assets/css/animate.min.css') ?>
    <?= Html::cssFile('@web/themes/backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') ?>
    <?= Html::cssFile('@web/themes/backend/assets/css/style.css') ?>
    <?= Html::cssFile('@web/themes/backend/assets/css/responsive.css') ?>

    <?= Html::jsFile('@web/themes/jquery.js') ?>

    <style>

        html, body, *, p, h1, h2, h3, h4 {
            font-family: 'Microsoft YaHei';
            letter-spacing: 1px;
        }

    </style>

</head>

<body class=" ">

<?php $this->beginBody() ?>

<div class='page-topbar '>
    <div class='logo-area'></div>
    <div class='quick-area'>

        <div class='pull-left'>
            <?= $this->render('../backend/message'); ?>
        </div>

        <div class='pull-right'>
            <ul class="info-menu right-links list-inline list-unstyled">
                <li class="profile">
                    <a href="#" data-toggle="dropdown" class="toggle">
                        <img src="<?= Yii::getAlias("@web") ?>/themes/backend/data/profile/profile.png" alt="user-image"
                             class="img-circle img-inline">
                        <span>Jason Bourne <i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="dropdown-menu profile animated fadeIn">
                        <li>
                            <a href="#settings">
                                <i class="fa fa-wrench"></i>
                                Settings
                            </a>
                        </li>
                        <li>
                            <a href="#profile">
                                <i class="fa fa-user"></i>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="#help">
                                <i class="fa fa-info"></i>
                                Help
                            </a>
                        </li>
                        <li class="last">
                            <a href="ui-login.html">
                                <i class="fa fa-lock"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="chat-toggle-wrapper">
                    <a href="#" data-toggle="chatbar" class="toggle_chat">
                        <i class="fa fa-comments"></i>
                        <span class="badge badge-warning">9</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</div>

<div class="page-container row-fluid">
    <div class="page-sidebar ">
        <div class="page-sidebar-wrapper" id="main-menu-wrapper">

            <!-- USER INFO - START -->
            <div class="profile-info row">

                <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                    <a href="ui-profile.html">
                        <img src="<?= Yii::getAlias("@web") ?>/themes/backend/data/profile/profile.png"
                             class="img-responsive img-circle">
                    </a>
                </div>

                <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                    <h3>
                        <a href="ui-profile.html">Jason Bourne</a>

                        <!-- Available statuses: online, idle, busy, away and offline -->
                        <span class="profile-status online"></span>
                    </h3>

                    <p class="profile-title">Web Developer</p>

                </div>

            </div>

            <?= $this->render('../backend/menu'); ?>

        </div>
    </div>

    <section id="main-content" class=" ">
        <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>

            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class="page-title">

                    <div class="pull-left">
                        <h1 class="title"
                            style="font-family: 'Microsoft YaHei';"><?= Html::encode($this->title); ?></h1>
                    </div>

                </div>
            </div>

            <div class="clearfix"></div>

            <?= $content; ?>

        </section>
    </section>

</div>


<?php $this->endBody(); ?>

</body>
</html>

<?php $this->endPage(); ?>

<?= Html::jsFile('@web/themes/backend/assets/js/jquery.easing.min.js') ?>
<?= Html::jsFile('@web/themes/backend/assets/plugins/bootstrap/js/bootstrap.min.js') ?>
<?= Html::jsFile('@web/themes/backend/assets/plugins/pace/pace.min.js') ?>
<?= Html::jsFile('@web/themes/backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') ?>
<?= Html::jsFile('@web/themes/backend/assets/plugins/viewport/viewportchecker.js') ?>
<?= Html::jsFile('@web/themes/backend/assets/plugins/inputmask/jquery.inputmask.bundle.min.js') ?>
<?= Html::jsFile('@web/themes/backend/assets/plugins/autonumeric/autoNumeric.js') ?>
<?= Html::jsFile('@web/themes/backend/assets/js/scripts.js') ?>
