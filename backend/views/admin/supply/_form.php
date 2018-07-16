<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Supply */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $this->registerCssFile('@web/themes/assets/plugins/daterangepicker/css/daterangepicker-bs3.css'); ?>
<?php $this->registerJsFile('@web/themes/assets/plugins/daterangepicker/js/moment.min.js'); ?>
<?php $this->registerJsFile('@web/themes/assets/plugins/daterangepicker/js/daterangepicker.js'); ?>

<div class="col-lg-12">
    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?></h2></header>

        <div class="content-body">
            <div class="row">

                <?php $form = ActiveForm::begin(); ?>

                <?=
                $form->field($model, 'c_key')->widget(Select2::classname(), [
                    'data'    => $result['classify'],
                    'options' => ['placeholder' => '供应分类...'],
                ]);
                ?>

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?=
                $form->field($model, 'content')
                    ->widget('kucha\ueditor\UEditor', [
                        'clientOptions' => [
                            //设置语言
                            'lang'               => 'zh-cn',
                            'initialFrameHeight' => '600',
                            'elementPathEnabled' => false,
                            'wordCount'          => false,
                        ]
                    ]);
                ?>

                <?= $this->render('../upload', ['model' => $model, 'text' => '供应图片', 'form' => $form, 'attribute' => 'path', 'id' => $model->supply_id]); ?>

                <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'num')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'start_at')->textInput(['class' => 'form-control daterange', 'data-format' => 'YYYY/MM/DD hh:mm A', 'data-time-picker-increment' => 5, 'data-time-picker' => 'true']) ?>

                <?=
                $form->field($model, 'is_type')->widget(Select2::classname(), [
                    'data'    => ['Long' => '长期供应', 'Short' => '短期供应'],
                    'options' => ['placeholder' => '供应类型...'],
                ]);
                ?>

                <?=
                $form->field($model, 'is_status')->widget(Select2::classname(), [
                    'data'    => ['On' => '供应中', 'Off' => '关闭'],
                    'options' => ['placeholder' => '供应状态...'],
                ]);
                ?>

                <?=
                $form->field($model, 'is_using')->widget(Select2::classname(), [
                    'data'    => ['On' => '启用', 'Off' => '不启用'],
                    'options' => ['placeholder' => '是否启用...'],
                ]);
                ?>

                <?=
                $form->field($model, 'is_send_msg')->widget(Select2::classname(), [
                    'data'    => ['On' => '群发供应商', 'Off' => '不群发'],
                    'options' => ['placeholder' => '是否群发...'],
                ]);
                ?>

                <div class="form-group">

                    <?= Html::submitButton($model->isNewRecord ? '发布供应信息' : '更新供应信息', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </section>

    <?= $this->render('../../formMsg'); ?>

</div>
