<?php

/**
 *  登录模板
 *
 * @author Yxl <zccem@163.com>
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use app\components\iAjax\AjaxMsg;

$this->title = '登录';
?>

<div class="site-login">

    <br/>
    <br/>

    <div class="col-md-12 col-lg-offset-1 col-lg-11">
        <p>
        <h1>欢迎您, 光顾挂载中心!!</h1>
        </p>

        <br/>
        <br/>


        <br/>
        <br/>

        <?php
        $form = ActiveForm::begin(
            [
                'id'      => $model->formName(),
                'options' => ['class' => 'form-horizontal'],
            ]
        );
        ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('帐号 : '); ?>

        <?= $form->field($model, 'password')->passwordInput()->label('密码 : '); ?>

        <?= $form->field($model, 'rememberMe')->checkbox()->label('记住我'); ?>

        <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>

        <?php ActiveForm::end(); ?>

        <?=
        AjaxMsg::widget(
            [
                'config' => [
                    'FormName' => $model->formName(),
                    'Url'      => Url::to(['Mount/center/view']),
                ],
            ]
        );
        ?>

    </div>

</div>
