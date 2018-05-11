<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model common\models\Purchase */
/* @var $form yii\widgets\ActiveForm */

?>

<style type="text/css">
    .preview img {
        width: 180px;
        height: 100px;
    }
</style>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left"><?= Html::encode($this->title) ?></h2>
        </header>
        <div class="content-body">
            <div class="row">

                <?php $form = ActiveForm::begin(); ?>

                <?=
                $form->field($model, 'c_key')->widget(Select2::classname(), [
                    'data'    => $result['classify'],
                    'options' => ['placeholder' => '采购分类...'],
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

                <hr/>

                <?=
                FileUploadUI::widget([
                    'model'         => $model,
                    'attribute'     => 'path',
                    'url'           => ['admin/upload/image-upload', 'id' => $model->purchase_id, 'type' => 'purchase', 'attribute' => 'path'],
                    'gallery'       => false,
                    'fieldOptions'  => [
                        'accept' => 'file/*'
                    ],
                    'clientOptions' => [
                        'maxFileSize'      => 2000000,
                        'dataType'         => 'json',
                        'maxNumberOfFiles' => 5,
                    ],

                    // ...
                    'clientEvents'  => [

                        'fileuploaddone' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                                
                                var html = "";
                                
                                var ImagesContent = $("#ImagesContent");
                                
                                $.each(data.result.files, function (index, file) {
                                    html += file.name + \',\';
                                });
                                
                                html += ImagesContent.val();
                                
                                ImagesContent.val(html);
                                
                                return true;
                            }',
                        'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
                    ],
                ]);
                ?>

                <?= $form->field($model, 'path')->textarea(['id' => 'ImagesContent', 'style' => 'display:none;'])->label(false) ?>

                <hr/>

                <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'num')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'start_at')->widget(
                    DatePicker::className(), [
                    'template'      => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format'    => 'dd-M-yyyy'
                    ]
                ]); ?>

                <?= $form->field($model, 'end_at')->widget(
                    DatePicker::className(), [
                    'template'      => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format'    => 'dd-M-yyyy'
                    ]
                ]); ?>

                <?=
                $form->field($model, 'is_type')->widget(Select2::classname(), [
                    'data'    => ['Long' => '长期采购', 'Short' => '短期采购'],
                    'options' => ['placeholder' => '采购类型...'],
                ]);
                ?>

                <?=
                $form->field($model, 'is_status')->widget(Select2::classname(), [
                    'data'    => ['On' => '采购中', 'Off' => '关闭'],
                    'options' => ['placeholder' => '采购状态...'],
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

                    <?= Html::submitButton($model->isNewRecord ? '发布采购信息' : '更新采购信息', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

        <?= $this->render('resultImg', ['img' => $model->path, 'type' => 'purchase']); ?>

    </section>

    <?= $this->render('../../formMsg'); ?>

</div>
