<?php
/**
 *
 * 前台登录模板
 *
 * Created by Yixianliu.
 * User: Yxl <zccem@163.com>
 * Date: 2017/6/19
 * Time: 9:26
 */

use yii\widgets\ActiveForm;

?>

<div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

    <div class="acctitle">
        <i class="acc-closed icon-lock3"></i>
        <i class="acc-open icon-unlock"></i>
        欢迎登录 !!
    </div>

    <div class="acc_content clearfix">

        <?php
        $form = ActiveForm::begin(
            [
                'action'  => ['Frontend/member/login'],
                'id'      => 'login-form',
                'options' => ['class' => 'form-horizontal'],
            ]
        )
        ?>

        <div class="col_full">

            <?=
            $form->field($model, 'username')->textInput(['id' => 'login-form-username', 'class' => 'form-control', 'autofocus' => true, 'placeholder' => '填写帐号,以邮箱或者手机的方式...'])
                ->label('username');
            ?>

        </div>

        <div class="col_full">

            <?=
            $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => '棉麻...'])
                ->label('password');
            ?>

        </div>

        <div class="col_full nobottommargin">

            <button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">
                登录
            </button>

            <a href="#" class="fright">忘记密码?</a>
        </div>
        </form>

        <?php ActiveForm::end() ?>

    </div>
