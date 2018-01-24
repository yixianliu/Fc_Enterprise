<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model common\models\Supply */
/* @var $form yii\widgets\ActiveForm */
?>

<section class="section-wrap blog-standard" style="padding: 60px 0">
    <div class="container relative">
        <div class="row">

            <div class="col-sm-3 sidebar blog-sidebar">
                <?= $this->render('../user/_left'); ?>
            </div>

            <div class="col-sm-9 blog-content">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'c_key')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'supply_id')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

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

                <?= $form->field($model, 'is_type')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'is_status')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'start_at')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'end_at')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'is_send_msg')->textInput(['maxlength' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

        <?= Yii::$app->view->renderFile('@app/views/default/formMsg.php'); ?>

    </div>
</section>


