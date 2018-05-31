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
                $form->field($model, 'page_id')->widget(kartik\select2\Select2::classname(), [
                    'data'          => $result['page'],
                    'options'       => ['placeholder' => '选择单页面...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?=
                $form->field($model, 'c_key')->widget(kartik\select2\Select2::classname(), [
                    'data'          => $result['classify'],
                    'options'       => ['placeholder' => '选择分类...'],
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

                <?= $this->render('../upload', ['model' => $model, 'text' => '单页面列表图片', 'form' => $form, 'attribute' => 'path', 'type' => 'pages-list', 'id' => 1]); ?>

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
    </section>

    <?= $this->render('../../formMsg'); ?>

</div>