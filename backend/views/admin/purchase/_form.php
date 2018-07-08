<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Purchase */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="col-lg-12">
    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?></h2></header>

        <div class="content-body">
            <div class="row">

                <?php if (!empty($result['classify']) && is_array($result['classify'])): ?>

                    <?php $form = ActiveForm::begin(); ?>

                    <?=
                    $form->field($model, 'c_key')->widget(Select2::classname(), [
                        'data' => $result['classify'],
                        'options' => ['placeholder' => '采购分类...'],
                    ]);
                    ?>

                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?=
                    $form->field($model, 'content')->widget('kucha\ueditor\UEditor', [
                        'clientOptions' => [
                            //设置语言
                            'lang' => 'zh-cn',
                            'initialFrameHeight' => '600',
                            'elementPathEnabled' => false,
                            'wordCount' => false,
                        ]
                    ]);
                    ?>

                    <?= $this->render('../upload', ['model' => $model, 'text' => '采购相关图片', 'form' => $form, 'id' => $model->purchase_id]); ?>

                    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'num')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'start_at')->widget(
                        DatePicker::className(), [
                        'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-M-yyyy'
                        ]
                    ]); ?>

                    <?= $form->field($model, 'end_at')->widget(
                        DatePicker::className(), [
                        'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-M-yyyy'
                        ]
                    ]); ?>

                    <?=
                    $form->field($model, 'is_type')->widget(Select2::classname(), [
                        'data' => ['Long' => '长期采购', 'Short' => '短期采购'],
                        'options' => ['placeholder' => '采购类型...'],
                    ]);
                    ?>

                    <?=
                    $form->field($model, 'is_status')->widget(Select2::classname(), [
                        'data' => ['On' => '采购中', 'Off' => '关闭'],
                        'options' => ['placeholder' => '采购状态...'],
                    ]);
                    ?>

                    <?=
                    $form->field($model, 'is_using')->widget(Select2::classname(), [
                        'data' => ['On' => '启用', 'Off' => '不启用'],
                        'options' => ['placeholder' => '是否启用...'],
                    ]);
                    ?>

                    <?=
                    $form->field($model, 'is_send_msg')->widget(Select2::classname(), [
                        'data' => ['On' => '群发供应商', 'Off' => '不群发'],
                        'options' => ['placeholder' => '是否群发...'],
                    ]);
                    ?>

                    <?= $form->field($model, 'purchase_id')->hiddenInput(['value' => $model->purchase_id])->label(false); ?>

                    <div class="form-group">

                        <?= Html::submitButton($model->isNewRecord ? '发布采购信息' : '更新采购信息', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                    </div>

                    <?php ActiveForm::end(); ?>

                <?php else: ?>

                    <h4>没有采购分类, 赶紧添加 <a href="<?= \yii\helpers\Url::to(['admin/psb-cls/create', 'type' => 'Purchase', 'id' => 'P0']) ?>">采购分类</a></h4>

                <?php endif ?>

            </div>
        </div>
    </section>

    <?= $this->render('../../formMsg'); ?>

</div>
