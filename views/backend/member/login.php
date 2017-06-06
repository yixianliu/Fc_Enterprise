<?php
/**
 *
 * 登录模板
 *
 * Created by Yixianliu.
 * User: Yxl <zccem@163.com>
 * Date: 2017/6/6
 * Time: 14:47
 */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '登录系统';
?>

<!DOCTYPE html>
<html class=" ">
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
          href="<?= Yii::getAlias("@web") ?>/themes/backend/assets/images/apple-touch-icon-114-precomposed.png">
    <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="<?= Yii::getAlias("@web") ?>/themes/backend/assets/images/apple-touch-icon-72-precomposed.png">
    <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="<?= Yii::getAlias("@web") ?>/themes/backend/assets/images/apple-touch-icon-144-precomposed.png">
    <!-- For iPad Retina display -->

    <!-- CORE CSS FRAMEWORK - START -->
    <?= Html::cssFile('@web/themes/backend/assets/plugins/pace/pace-theme-flash.css') ?>
    <?= Html::cssFile('@web/themes/backend/assets/plugins/bootstrap/css/bootstrap.min.css') ?>
    <?= Html::cssFile('@web/themes/backend/assets/plugins/bootstrap/css/bootstrap-theme.min.css') ?>
    <?= Html::cssFile('@web/themes/backend/assets/fonts/font-awesome/css/font-awesome.css') ?>
    <?= Html::cssFile('@web/themes/backend/assets/css/animate.min.css') ?>
    <?= Html::cssFile('@web/themes/backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') ?>
    <?= Html::cssFile('@web/themes/backend/assets/plugins/icheck/skins/square/orange.css') ?>
    <?= Html::cssFile('@web/themes/backend/assets/css/style.css') ?>
    <?= Html::cssFile('@web/themes/backend/assets/css/responsive.css') ?>

    <?= Html::jsFile('@web/themes/backend/assets/js/jquery-1.11.2.min.js') ?>
    <?= Html::jsFile('@web/themes/backend/assets/js/jquery.easing.min.js') ?>
    <?= Html::jsFile('@web/themes/backend/assets/plugins/bootstrap/js/bootstrap.min.js') ?>
    <?= Html::jsFile('@web/themes/backend/assets/plugins/pace/pace.min.js') ?>
    <?= Html::jsFile('@web/themes/backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') ?>
    <?= Html::jsFile('@web/themes/backend/assets/plugins/viewport/viewportchecker.js') ?>
    <?= Html::jsFile('@web/themes/backend/assets/plugins/icheck/icheck.min.js') ?>
    <?= Html::jsFile('@web/themes/backend/assets/js/scripts.js') ?>

</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class=" login_page">


<div class="login-wrapper">
    <div id="login"
         class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">
        <h1><a href="#" title="Login Page" tabindex="-1">Ultra Admin</a></h1>

        <form name="loginform" id="loginform" action="index.html" method="post">
            <p>
                <label for="user_login">Username<br/>
                    <input type="text" name="log" id="user_login" class="input" value="demo" size="20"/>
                </label>
            </p>
            <p>
                <label for="user_pass">Password<br/>
                    <input type="password" name="pwd" id="user_pass" class="input" value="demo" size="20"/></label>
            </p>
            <p class="forgetmenot">
                <label class="icheck-label form-label" for="rememberme">
                    <input name="rememberme" type="checkbox" id="rememberme" value="forever" class="skin-square-orange"
                           checked/>
                    Remember me
                </label>
            </p>


            <p class="submit">
                <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-orange btn-block" value="Sign In"/>
            </p>
        </form>

        <p id="nav">
            <a class="pull-left" href="#" title="Password Lost and Found">Forgot password?</a>
            <a class="pull-right" href="ui-register.html" title="Sign Up">Sign Up</a>
        </p>


    </div>
</div>

</body>
</html>



