<?php
/**
 *
 * 登录模板
 *
 * Created by Yixianliu.
 * User: Yxl <zccem@163.com>
 * Date: 2017/6/19
 * Time: 9:26
 */

use yii\widgets\ActiveForm;

?>

<div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

    <div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Login
        to your Account
    </div>

    <div class="acc_content clearfix">

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'nobottommargin'],]) ?>

        <div class="col_full">
            <label for="login-form-username">Username:</label>
            <input type="text" id="login-form-username" name="login-form-username" value=""
                   class="form-control"/>
        </div>

        <div class="col_full">
            <label for="login-form-password">Password:</label>
            <input type="password" id="login-form-password" name="login-form-password" value=""
                   class="form-control"/>
        </div>

        <div class="col_full nobottommargin">

            <button class="button button-3d button-black nomargin" id="login-form-submit"
                    name="login-form-submit" value="login">登录
            </button>

            <a href="#" class="fright">Forgot Password?</a>
        </div>
        </form>

        <?php ActiveForm::end() ?>

    </div>
