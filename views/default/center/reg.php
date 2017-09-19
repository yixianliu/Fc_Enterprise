<?php
/**
 *
 * 前台注册模板
 *
 * Created by Yixianliu.
 * User: Yxl <zccem@163.com>
 * Date: 2017/6/19
 * Time: 9:26
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\iAjax\AjaxMsg;

?>

<div class="acctitle"><i class="acc-closed icon-user4"></i><i class="acc-open icon-ok-sign"></i>
    注册吗?注册一个账户,享受更好的服务...
</div>

<div class="acc_content clearfix">

    <?php
    $form = ActiveForm::begin(
        [
            'action'  => ['Frontend/member/reg'],
            'id'      => $model->formName(),
            'options' => ['class' => 'form-horizontal'],
        ]
    )
    ?>

    <div class="col_full">
        <?= $form->field($model, 'username')->textInput(['placeholder' => '用户名...', 'autofocus' => true])->label('username') ?>
    </div>

    <div class="col_full">
        <?= $form->field($model, 'telphone')->textInput(['placeholder' => '填写手机方便收取信息...'])->label('telphone') ?>
    </div>

    <div class="col_full">
        <?= $form->field($model, 'email')->textInput()->label('email') ?>
    </div>

    <div class="col_full">
        <?= $form->field($model, 'password')->passwordInput()->label('password') ?>
    </div>

    <div class="col_full">
        <?= $form->field($model, 'repassword')->passwordInput()->label('repassword') ?>
    </div>

    <div class="col_full">

        <?= Html::submitButton('立即注册', ['class' => 'button button-3d button-black nomargin', 'name' => 'submit-button']); ?>

    </div>

    <?php ActiveForm::end() ?>

    <?=
    AjaxMsg::widget(
        [
            'config' => [

                'Tpl'      => 'AjaxMsgFrontTpl',
                'FormName' => $model->formName(),
                'FormUrl'  => Url::to(['Fronted/user/view']),
            ],
        ]
    );
    ?>

</div>
