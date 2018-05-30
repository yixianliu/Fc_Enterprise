<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model common\models\Resume */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left"><?= Html::encode($this->title) ?></h2>
        </header>
        <div class="content-body">
            <div class="row">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'user_id')->textInput(['maxlength' => true, 'readonly' => 'readonly']) ?>

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

                <?= $this->render('../upload', ['model' => $model, 'text' => '简历图片', 'form' => $form, 'attribute' => 'path', 'type' => 'resume', 'id' => $model->id]); ?>

                <?=
                $form->field($model, 'is_using')->widget(Select2::classname(), [
                    'data'    => ['On' => '审核', 'Off' => '审核不过'],
                    'options' => ['placeholder' => '是否启用...'],
                ]);
                ?>

                <div class="form-group">

                    <?= Html::submitButton($model->isNewRecord ? '发布简历' : '更新简历', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </section>

    <?= $this->render('../../formMsg'); ?>

</div>

