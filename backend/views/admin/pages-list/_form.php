<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model common\models\PagesList */
/* @var $form yii\widgets\ActiveForm */
?>

<style type="text/css">
    .preview img {
        width: 120px;
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
                $form->field($model, 'page_id')->widget(kartik\select2\Select2::classname(), [
                    'data'          => $result['page'],
                    'options'       => ['placeholder' => '选择...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?=
                $form->field($model, 'content')->widget('kucha\ueditor\UEditor', [
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
                    'url'           => ['admin/upload/image-upload', 'id' => 1, 'type' => 'pages', 'attribute' => 'path'],
                    'gallery'       => false,
                    'fieldOptions'  => [
                        'accept' => 'file/*',
                    ],
                    'clientOptions' => [
                        'maxFileSize'      => 5000000,
                        'dataType'         => 'json',
                        'maxNumberOfFiles' => 1,
                    ],

                    // ...
                    'clientEvents'  => [

                        'fileuploaddone' => 'function(e, data) {

                                if (data.result.status == false) {
                                    alert(data.result.message);
                                    return true;
                                }
                              
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

                <?=
                $form->field($model, 'is_using')->widget(kartik\select2\Select2::classname(), [
                    'data'          => ['On' => '开启', 'Off' => '关闭'],
                    'options'       => ['placeholder' => '选择...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <div class="form-group">

                    <?= Html::submitButton($model->isNewRecord ? '发布内容' : '更新内容', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

        <?= $this->render('../result_img', ['img' => $model->path, 'type' => 'pages-list']); ?>

    </section>
</div>
