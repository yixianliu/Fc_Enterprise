<?php
/**
 *
 * 注册模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/12/12
 * Time: 16:14
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

?>

<section class="section-wrap contact" id="contact">
    <div class="container">

        <div class="row heading">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h2 class="text-center bottom-line">联系我们</h2>
                <p class="subheading">Dont hesitate to get touch please fill out this form and we'll get back to you within 48hrs. We hand picked to provide the right balance of skills
                    to work.</p>
            </div>
        </div>

        <div class="row">

            <div class="col-md-4">
                <h5>上班时间</h5>
                <p>礼拜一 至 礼拜六: 8:00 – 20:00</p>

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="icon icon-Pointer"></i>
                    </div>
                    <h6>Address</h6>
                    <p>Philippines,<br>
                        Greenwich st. 256/6, 62058</p>
                </div> <!-- end address -->

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="icon icon-Phone"></i>
                    </div>
                    <h6>Call Us</h6>
                    <span>+1 888 5146 3269</span>
                </div> <!-- end phone number -->

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="icon icon-Mail"></i>
                    </div>
                    <h6>E-mail</h6>
                    <a href="mailto:enigmasupport@gmail.com">enigmasupport@gmail.com</a>
                </div>

            </div>

            <div class="col-md-8">


                <?php
                $form = ActiveForm::begin(['action' => ['admin/member/login'], 'method' => 'post', 'id' => $model->formName()]);
                ?>

                <?=
                $form->field($model, 'is_type')->widget(Select2::classname(), [
                    'data'    => ['Long' => '长期采购', 'Short' => '短期采购'],
                    'options' => ['placeholder' => '采购类型...'],
                ]);
                ?>

                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'repassword')->textInput(['maxlength' => true]) ?>

                <div class="row contact-row">

                    <div class="col-md-6 contact-name">
                        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-md-6 contact-email">
                        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                    </div>

                </div>

                <textarea name="comment" id="comment" placeholder="Message"></textarea>

                <?= Html::submitButton('注册', ['class' => 'btn btn-lg btn-color btn-submit']) ?>

                <div id="msg" class="message"></div>

                <?php ActiveForm::end() ?>

            </div>

        </div>
    </div>
</section>
