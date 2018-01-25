<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model common\models\Download */
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

                <?php if (!empty($result['classify'])): ?>

                    <?php $form = ActiveForm::begin(); ?>

                    <?=
                    $form->field($model, 'c_key')->widget(Select2::classname(), [
                        'data'          => $result['classify'],
                        'options'       => ['placeholder' => '选择下载分类...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <hr/>

                    <?=
                    FileUploadUI::widget([
                        'model'         => $model,
                        'attribute'     => 'path',
                        'url'           => ['admin/upload/image-upload', 'id' => $model->id, 'type' => 'download'],
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

                    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

                    <?=
                    $form->field($model, 'is_using')->widget(Select2::classname(), [
                        'data'    => ['On' => '启用', 'Off' => '未启用'],
                        'options' => ['placeholder' => '是否启用...'],
                    ]);
                    ?>

                    <div class="form-group">

                        <?= Html::submitButton($model->isNewRecord ? '添加下载内容' : '更新下载内容', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                    </div>

                    <?php ActiveForm::end(); ?>

                <?php else: ?>

                    <h3>暂无分类 !! 点 <a href="<?= Url::to(['admin/download-cls/create']) ?>">这里</a> 添加</h3>

                <?php endif; ?>

            </div>
        </div>

        <?= $this->render('../result_img', ['img' => $model->path, 'type' => 'job']); ?>

    </section>

    <?= $this->render('../../formMsg'); ?>

</div>
