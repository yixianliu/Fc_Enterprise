<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SinglePage */
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

                <?= $form->field($model, 'page_id')->textInput(['maxlength' => true, 'readonly' => '']) ?>

                <?=
                $form->field($model, 'c_key')->widget(kartik\select2\Select2::classname(), [
                    'data'          => $result['classify'],
                    'options'       => ['placeholder' => '选择分类...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?=
                $form->field($model, 'is_type')->widget(kartik\select2\Select2::classname(), [
                    'data'          => ['list' => '列表内容类型', 'content' => '内容详情类型'],
                    'options'       => ['placeholder' => '选择内容类型...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

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

                <?= $form->field($model, 'path')->textInput(['maxlength' => true]) ?>

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

                    <?= Html::submitButton($model->isNewRecord ? '创建单页面' : '更新单页面', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </section>
</div>

