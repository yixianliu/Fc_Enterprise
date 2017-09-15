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
use yii\bootstrap\ActiveForm;
use app\components\iAjax\AjaxMsg;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = '登录系统';
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

    <link rel="apple-touch-icon-precomposed" href="<?= Yii::getAlias("@web") ?>/themes/backend/assets/images/apple-touch-icon-57-precomposed.png">
    <!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= Yii::getAlias("@web") ?>/themes/backend/assets/images/apple-touch-icon-114-precomposed.png">
    <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= Yii::getAlias("@web") ?>/themes/backend/assets/images/apple-touch-icon-72-precomposed.png">
    <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= Yii::getAlias("@web") ?>/themes/backend/assets/images/apple-touch-icon-144-precomposed.png">
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

    <?= Html::jsFile('@web/themes/jquery.js') ?>

    <style>

        html, body, *, p, h1, h2, h3, h4, input {
            font-family: 'Microsoft YaHei';
            letter-spacing: 1px;
        }

    </style>

</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class=" login_page">

<?php $this->beginBody() ?>

<div class="login-wrapper">
    <div id="login"
         class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">
        <h1>
            <a href="#" title="<?= Yii::$app->params['NAME']; ?>" tabindex="-1"><?= Yii::$app->params['NAME']; ?> - <?= Yii::$app->params['TITLE']; ?></a>
        </h1>

        <?php $form = ActiveForm::begin(['action' => ['Backend/member/login'], 'method' => 'post', 'id' => $model->formName(),]); ?>

        <p>
            <label for="username" style="letter-spacing: 4px;">帐号<br/>
                <?= $form->field($model, 'username')->textInput(['id' => 'username', 'class' => 'input', 'size' => 20, 'placeholder' => '填写帐号...', 'autofocus' => true])
                    ->label(false); ?>
            </label>
        </p>

        <p>
            <label for"password" style="letter-spacing: 4px;">密码<br/>
            <?= $form->field($model, 'password')->passwordInput(['id' => 'password', 'class' => 'input', 'size' => 20, 'placeholder' => '填写帐号...',])->label(false); ?>
            </label>
        </p>

        <p class="forgetmenot">
            <label class="icheck-label form-label" for="rememberme">
                <input name="rememberme" type="checkbox" id="rememberme" value="forever" class="skin-square-orange"
                       checked/>
                永久记住 (不安全)
            </label>
        </p>

        <p class="submit">
            <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-orange btn-block" value="登录系统"/>
        </p>

        <?php ActiveForm::end(); ?>

        <?=
        AjaxMsg::widget(
            ['config' => [
                'Tpl'      => 'AjaxMsgBackendTpl',
                'FormName' => $model->formName() . '11',
                'Url'      => Url::to(['Mount/center/view']),
            ]]
        );
        ?>

        <p id="nav">
            <a class="pull-left" href="#" title="Password Lost and Found"> 忘记密码 ?</a>
            <a class="pull-right" href="#" title="Sign Up">论坛申请</a>
        </p>

    </div>
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
<?= Html::jsFile('@web/themes/backend/assets/plugins/icheck/icheck.min.js') ?>
<?= Html::jsFile('@web/themes/backend/assets/js/scripts.js') ?>


