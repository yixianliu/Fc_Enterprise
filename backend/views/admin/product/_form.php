<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */

if (empty($result['classify'])) {
    $result['classify'] = null;
}
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

                <?php if (!empty($result['classify']) && is_array($result['classify'])): ?>

                    <?php $form = ActiveForm::begin(); ?>

                    <?=
                    $form->field($model, 'c_key')->widget(Select2::classname(), [
                        'data'          => $result['classify'],
                        'options'       => ['placeholder' => '选择产品分类...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    <?=
                    $form->field($model, 's_key')->widget(Select2::classname(), [
                        'data'          => $result['section'],
                        'options'       => ['placeholder' => '选择版块...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'introduction')->textarea(['maxlength' => true, 'rows' => 6]) ?>

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
                        'attribute'     => 'images',
                        'url'           => ['admin/upload/image-upload', 'id' => $model->product_id, 'type' => 'product'],
                        'gallery'       => false,
                        'fieldOptions'  => [
                            'accept' => 'image/*'
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

                    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'discount')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

                    <?=
                    $form->field($model, 'is_promote')->widget(Select2::classname(), [
                        'data'          => ['On' => '开启', 'Off' => '关闭'],
                        'options'       => ['placeholder' => '选择...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    <?=
                    $form->field($model, 'is_hot')->widget(Select2::classname(), [
                        'data'          => ['On' => '开启', 'Off' => '关闭'],
                        'options'       => ['placeholder' => '选择产品分类...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    <?=
                    $form->field($model, 'is_classic')->widget(Select2::classname(), [
                        'data'          => ['On' => '开启', 'Off' => '关闭'],
                        'options'       => ['placeholder' => '选择...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    <?=
                    $form->field($model, 'is_winnow')->widget(Select2::classname(), [
                        'data'          => ['On' => '开启', 'Off' => '关闭'],
                        'options'       => ['placeholder' => '选择...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    <?=
                    $form->field($model, 'is_recommend')->widget(Select2::classname(), [
                        'data'          => ['On' => '开启', 'Off' => '关闭'],
                        'options'       => ['placeholder' => '选择...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    <?=
                    $form->field($model, 'is_audit')->widget(Select2::classname(), [
                        'data'          => ['On' => '开启', 'Off' => '关闭'],
                        'options'       => ['placeholder' => '选择...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    <?=
                    $form->field($model, 'is_field')->widget(Select2::classname(), [
                        'data'          => ['On' => '开启', 'Off' => '关闭'],
                        'options'       => ['placeholder' => '选择...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    <?=
                    $form->field($model, 'is_comments')->widget(Select2::classname(), [
                        'data'          => ['On' => '开启', 'Off' => '关闭'],
                        'options'       => ['placeholder' => '选择...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    <?=
                    $form->field($model, 'is_img')->widget(Select2::classname(), [
                        'data'          => ['On' => '开启', 'Off' => '关闭'],
                        'options'       => ['placeholder' => '选择...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    <?=
                    $form->field($model, 'is_thumb')->widget(Select2::classname(), [
                        'data'          => ['On' => '开启', 'Off' => '关闭'],
                        'options'       => ['placeholder' => '选择...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->identity->username])->label(false); ?>

                    <div class="form-group">

                        <?= Html::submitButton($model->isNewRecord ? '发布产品' : '更新产品', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                    </div>

                    <?php ActiveForm::end(); ?>

                <?php else: ?>

                    <h1>没有产品分类, 赶紧添加 <a href="<?= \yii\helpers\Url::to(['admin/product-cls/create']) ?>">产品分类</a></h1>

                <?php endif ?>

            </div>
        </div>

        <?= $this->render('../result_img', ['img' => $model->images, 'type' => 'product']); ?>

    </section>

    <?= $this->render('../../formMsg'); ?>

</div>