<?php

/**
 * 幻灯片表单
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model common\models\Slide */
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
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                    <?= $form->field($model, 'slide_id')->textInput(['maxlength' => true, 'readonly' => '']) ?>

                    <?= $form->field($model, 'page_id')->textInput(['maxlength' => true]) ?>

                    <hr/>

                    <?=
                    FileUploadUI::widget([
                        'model'         => $model,
                        'attribute'     => 'path',
                        'url'           => ['admin/slide/image-upload', 'id' => $model->slide_id],
                        'gallery'       => false,
                        'fieldOptions'  => [
                            'accept' => 'image/*'
                        ],
                        'clientOptions' => [
                            'maxFileSize' => 2000000
                        ],
                        // ...
                        'clientEvents'  => [
                            'fileuploaddone' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                                alert(data.message);
                            }',
                            'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
                        ],
                    ]);
                    ?>

                    <hr/>

                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                    <?=
                    $form->field($model, 'is_using')->widget(kartik\select2\Select2::classname(), [
                        'data'          => ['On' => '启用', 'Off' => '未启用'],
                        'options'       => ['placeholder' => '是否启用...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    <div class="form-group">

                        <?= Html::submitButton($model->isNewRecord ? '创建幻灯片' : '更新幻灯片', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </section>
</div>


