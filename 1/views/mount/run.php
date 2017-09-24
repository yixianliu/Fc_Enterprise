<?php

/**
 *  安装模板
 *
 * @author Yxl <zccem@163.com>
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use app\components\iAjax\AjaxMsg;

?>

<br />
<br />
<br />
<br />
<br />
<br />
<br />

<div class="jumbotron">

    <h1>准备开始安装 !!</h1>

    <br/>
    <p class="lead">本次挂载,会重新安装程序, 关于数据库内容也会清零, 但数据库表也会存在...</p>

    <p class="lead text-left">
    <h6>This will reinstall the program, the database content will be zero, but the database table will also exist...</h6>
    </p>

    <?php
    $form = ActiveForm::begin(
        [
            'id' => $model->formName(),
            'action' => ['Mount/run/install'],
            'options' => ['class' => 'form-horizontal'],

        ]
    );
    ?>

    <?= $form->field($model, 'agreement')->hiddenInput(['value' => 'On'])->label(false) ?>

    <?= Html::submitButton('进行挂载 » »', ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>

    <?php ActiveForm::end(); ?>

    <div class="text-left">
        <?=

        AjaxMsg::widget(
            [
                'config' => [
                    'Tpl' => 'AjaxMsgMountTpl',
                    'FormName' => $model->formName(),
                    'FormUrl' => Url::to(['Mount/center/view']),
                ],
            ]
        );

        ?>
    </div>

</div>

<br />
<br />
<br />
<br />