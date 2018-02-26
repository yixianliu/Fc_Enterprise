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

$this->registerCssFile('@web/themes/qijian/css/member.css');

?>

<div class="member-user-reg">

    <div class="user-reg-cont">

        <?php
        $form = ActiveForm::begin([
            'action'      => ['member/reg'],
            'method'      => 'post',
            'id'          => $model->formName(),
            'fieldConfig' => [
                'template'     => '<div>{input}</div>',
                'inputOptions' => ['class' => 'form-control'],
            ],
            'options'     => ['class' => 'form-horizontal']
        ]);
        ?>

        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">用户名 : </label>
            <div class="col-sm-9">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <?=
                    $form->field($model, 'username')
                        ->textInput(['maxlength' => true, 'id' => 'username', 'aria-describedby' => '请输入用户名或手机号码', 'placeholder' => '请输入用户名或手机号码'])
                        ->label(false)
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">设置密码 : </label>
            <div class="col-sm-9">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pass"></i></span>
                    <?=
                    $form->field($model, 'password')
                        ->passwordInput(['maxlength' => true, 'aria-describedby' => '请输入6-16位密码', 'placeholder' => '请输入6-16位密码'])
                        ->label(false)
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">

                <?= Html::submitButton('立即登录', ['class' => 'btn btn-red']) ?>

                <?= Html::a('没账号,请注册', ['member/reg'], ['class' => 'btn btn-red']) ?>

            </div>
        </div>

        <?php ActiveForm::end() ?>

    </div>

    <?= Yii::$app->view->renderFile('@app/views/default/formMsg.php'); ?>

</div>

<div id="myCarousel" class="carousel slide">

    <!-- 轮播（Carousel）指标 -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner">
        <div class="item active">
            <?= Html::img(Url::to('@web/themes/qijian/images/banar3.jpg'), ['alt' => '']); ?>
        </div>
        <div class="item">
            <?= Html::img(Url::to('@web/themes/qijian/images/banar3.jpg'), ['alt' => '']); ?>
        </div>
        <div class="item">
            <?= Html::img(Url::to('@web/themes/qijian/images/banar3.jpg'), ['alt' => '']); ?>
        </div>
    </div>

    <!-- 轮播（Carousel）导航 -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>

</div>

<div class="container-fluid h-job">

    <div class="container">

        <div class="starter-template">
            <h1 class="text-center text-color"><span style="color: #cf0d15;font-weight: bold;">建筑辅材</span> 采购招标火热招募中</h1>
            <h5 class="text-center text-color">追求绿色环保、完美空间创造的精神</h5>
            <h5 class="text-center"><a class="hjob-btn" title="" href="<?= Url::to(['/purchase/center']) ?>">立即前往 >></a></h5>
        </div>

    </div>

</div>

<script type="text/javascript">
    $('.input-group').children('div').removeClass('form-group');
</script>
