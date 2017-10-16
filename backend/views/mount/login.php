<?php
/**
 *
 * 登录模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/10/16
 * Time: 17:28
 */
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
    <title>Ultra Admin : Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <?= Html::csrfMetaTags() ?>

    <?php $this->head() ?>

</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class=" login_page">

<?php $this->beginBody() ?>

<div class="login-wrapper">
    <div id="login" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">
        <h1><a href="#" title="Login Page" tabindex="-1">Ultra Admin</a></h1>

        <form name="loginform" id="loginform" action="index.html" method="post">
            <p>
                <label for="user_login">Username<br/>
                    <input type="text" name="log" id="user_login" class="input" value="demo" size="20"/></label>
            </p>
            <p>
                <label for="user_pass">Password<br/>
                    <input type="password" name="pwd" id="user_pass" class="input" value="demo" size="20"/></label>
            </p>
            <p class="forgetmenot">
                <label class="icheck-label form-label" for="rememberme">
                    <input name="rememberme" type="checkbox" id="rememberme" value="forever" class="skin-square-orange" checked>
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

<?php $this->endBody(); ?>

</body>
</html>

<?php $this->endPage() ?>