<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\NewsClassify */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'c_key')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'sort_id')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'json_data')->textarea(['rows' => 6, 'maxlength' => true]) ?>

<?=
$form->field($model, 'parent_id')->widget(Select2::classname(), [
    'data'    => $result['classify'],
    'options' => ['placeholder' => '父类...'],
]);
?>

<?=
$form->field($model, 'is_using')->widget(Select2::classname(), [
    'data'    => ['On' => '启用', 'Off' => '未启用'],
    'options' => ['placeholder' => '是否启用...'],
]);
?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? '创建新闻分类' : '更新新闻分类', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

