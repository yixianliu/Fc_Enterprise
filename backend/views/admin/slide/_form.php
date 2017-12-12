<?php

/**
 * 幻灯片表单
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model common\models\Slide */
/* @var $form yii\widgets\ActiveForm */

?>

<style type="text/css">
    .template-download img {
        width: 75px;
        height: 50px;
    }
</style>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">
                <?= Html::encode($this->title) ?>
            </h2>
        </header>
        <div class="content-body">
            <div class="row">

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'slide_id')->textInput(['maxlength' => true, 'readonly' => '']) ?>

                <?=
                $form->field($model, 'page_id')->widget(kartik\select2\Select2::classname(), [
                    'data'          => $result['page'],
                    'options'       => ['placeholder' => '选择...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

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
                        'maxFileSize' => 2000000,
                        'dataType'    => 'json',
                    ],

                    // ...
                    'clientEvents'  => [
                        'fileuploaddone' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                                
                                var html = "";
                                
                                $.each(data.result.files, function (index, file) {
                                    html += "<input type=\'hidden\' class=\'" + file.name + "\' name=\'Slide[path][]\' value=\'" + file.name + "\'>";
                                });
                                
                                $("#SlideImg").append(html);
                                
                                return true;
                            }',
                        'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
                    ],
                ]);
                ?>

                <hr/>

                <div id="SlideImg"></div>

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

        <?= $this->render('../result_img', ['result' => $result,]); ?>

    </section>
</div>


<script type="text/javascript">
    $('.delete').on('click', function () {
        var val = $(this).attr('class');
        $("." + val).remove();
    });
</script>
