<?php

/**
 *  登录模板
 *
 *  @author Yxl <zccem@163.com>
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use app\components\iAjax\AjaxMsg;

$this->title = '登录';
?>

<div class="site-login">

    <h1><?= Html::encode($this->title) ?></h1>

    <br />
    <br />

    <p>欢迎您, 光顾挂载中心!!</p>

    <?php $form = ActiveForm::begin(['id' => $model->formName(), 'options' => ['class' => 'form-horizontal'], 'fieldConfig' => ['template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>", 'labelOptions' => ['class' => 'col-lg-1 control-label']]]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('帐号 : '); ?>

    <?= $form->field($model, 'password')->passwordInput()->label('密码 : '); ?>

    <?= $form->field($model, 'rememberMe')->checkbox(['template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>"])->label('记住我'); ?>

    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?=
    AjaxMsg::widget(['config' => [
            'FormName' => $model->formName(),
            'Url' => Url::to(['Mount/center/view']),
    ]]);
    ?>

    <br />
    <br />

    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8">
            <div class="col-lg-offset-1">
                你可以登陆 <strong>挂载中心</strong> or <strong>游客中心</strong>.
            </div>
        </div>
    </div>

</div>
