<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model common\models\Job */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">
                    <?= Html::encode($this->title) ?>
                </h2>
            </header>
            <div class="content-body">
                <div class="row">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'job_id')->textInput(['maxlength' => true, 'readonly' => '']) ?>

                    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true, 'readonly' => '']) ?>

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

                    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

                    <hr/>

                    <?=
                    FileUploadUI::widget([
                        'model'         => $model,
                        'attribute'     => 'images',
                        'url'           => ['admin/upload/image-upload', 'id' => $model->job_id, 'type' => 'product'],
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

                    <?= $form->field($model, 'images')->textarea(['id' => 'ImagesContent', 'style' => 'display:none;'])->label(false) ?>

                    <hr/>

                    <?=
                    $form->field($model, 'is_audit')->widget(Select2::classname(), [
                        'data'    => ['On' => '审核', 'Off' => '审核不过'],
                        'options' => ['placeholder' => '是否启用...'],
                    ]);
                    ?>

                    <div class="form-group">

                        <?= Html::submitButton($model->isNewRecord ? '发布招聘' : '更新招聘', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>

            <?= $this->render('../result_img', ['img' => $model->images, 'type' => 'job']); ?>

        </section>
    </div>

<?= $this->render('../../form_msg'); ?>