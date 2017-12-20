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

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

$this->title = '用户注册';

$this->params['breadcrumbs'][] = ['label' => '用户中心', 'url' => ['/center/index']];
$this->params['breadcrumbs'][] = '注册';

?>

<section class="page-title text-center" style="background-image: url(<?= Url::to('@web/themes/enterprise/img') ?>/blog/blog_title_bg.jpg);height: 500px;">
    <div class="container relative clearfix">
    </div>
</section>

<section class="page-title style-2">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <?=
                \yii\widgets\Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]);
                ?>
            </div>
        </div>
    </div>
</section>

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
                $form = ActiveForm::begin(['action' => ['member/reg'], 'method' => 'post', 'id' => $model->formName()]);
                ?>

                <?=
                $form->field($model, 'is_type')->widget(Select2::classname(), [
                    'data'    => ['user' => '用户', 'enterprise' => '企业用户', 'supplier' => '供应商用户'],
                    'options' => ['placeholder' => '用户类型...'],
                ]);
                ?>

                <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'id' => 'username']) ?>

                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => true]) ?>

                <div class="row contact-row">

                    <div class="col-md-3 contact-name">
                        <?= $form->field($model, 'msg')->textInput(['maxlength' => 5]) ?>
                    </div>

                    <div class="col-md-6 contact-name" style="margin-top: 35px;"><a id="SendMsg">发送短信验证码</a></div>

                </div>

                <?= Html::submitButton('注册', ['class' => 'btn btn-lg btn-color btn-submit']) ?>

                <?php ActiveForm::end() ?>

            </div>

        </div>
    </div>
</section>

<script type="text/javascript">
    $('#SendMsg').on('click', function () {

        $(this).text('已发送,该注册验证码,1个小时内有效...');

        $.ajax({
            url: '<?= Url::to(['member/send']) ?>',
            type: 'POST', //GET
            async: true,    //或false,是否异步
            data: {
                username: $('#username').val(),
            },
            success: function (data, textStatus, jqXHR) {
                console.log(data);
                console.log(textStatus);
                console.log(jqXHR)
            },
            error: function (xhr, textStatus) {
                console.log('错误');
                console.log(xhr);
                console.log(textStatus)
            },
            complete: function () {
                console.log('结束')
            }
        });

    });
</script>
