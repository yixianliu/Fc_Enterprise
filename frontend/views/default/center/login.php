<?php
/**
 *
 * 登录模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/12/13
 * Time: 17:10
 */

$this->title = '用户登录';

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

$this->params['breadcrumbs'][] = ['label' => '用户中心', 'url' => ['/center/index']];
$this->params['breadcrumbs'][] = '登录';

?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<?= $this->render('../slide', ['pagekey' => 'member']); ?>

<?= $this->render('../nav'); ?>

<section class="section-wrap contact" id="contact" style="padding: 50px 0;">
    <div class="container">

        <div class="row heading">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h2 class="text-center bottom-line">联系我们</h2>
                <p class="subheading">Dont hesitate to get touch please fill out this form and we'll get back to you within 48hrs. We hand picked to provide the right balance of skills
                    to work.</p>
            </div>
        </div>

        <div class="row">

            <div class="col-md-3">
                <h5>上班时间</h5>
                <p>礼拜一 至 礼拜六: 8:00 – 20:00</p>

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="icon icon-Pointer"></i>
                    </div>
                    <h6>公司地址</h6>
                    <p style="font-size: 12px;">中国广东省湛江市,<br>
                        人民大道中34号南栋5楼,501</p>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="icon icon-Phone"></i>
                    </div>
                    <h6>联系电话</h6>
                    <span>+1 888 5146 3269</span>
                </div> <!-- end phone number -->

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="icon icon-Mail"></i>
                    </div>
                    <h6>邮箱地址</h6>
                    <a href="mailto:enigmasupport@gmail.com">woos@gmail.com</a>
                </div>

            </div>

            <div class="col-md-9">

                <?php
                $form = ActiveForm::begin(['action' => ['member/login'], 'method' => 'post', 'id' => $model->formName()]);
                ?>

                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>


                <?= Html::submitButton('立即登录', ['class' => 'btn btn-lg btn-color btn-submit']) ?>


                <?php ActiveForm::end() ?>

            </div>

        </div>
    </div>

    <?= Yii::$app->view->renderFile('@app/views/default/formMsg.php'); ?>

</section>

