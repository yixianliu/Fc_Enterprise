<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\ProductClassify */
/* @var $form yii\widgets\ActiveForm */

?>

<?php $form = ActiveForm::begin(); ?>

<?=
$form->field($model, 'parent_id')->widget(Select2::classname(), [
    'data'          => $result['classify'],
    'options'       => ['placeholder' => '选择产品分类...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
?>

<?= $form->field($model, 'c_key')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'sort_id')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?=
$form->field($model, 'description')->widget('kucha\ueditor\UEditor', [
    'clientOptions' => [
        //编辑区域大小
        'initialFrameHeight' => '400',
        //设置语言
        'lang'               => 'zh-cn',
    ]
]);
?>

<?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ico_class')->textInput(['maxlength' => true]) ?>

<?=
$form->field($model, 'is_using')->widget(Select2::classname(), [
    'data'          => ['On' => '开启', 'Off' => '关闭'],
    'options'       => ['placeholder' => '选择...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>