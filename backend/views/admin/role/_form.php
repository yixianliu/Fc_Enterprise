<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Role */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'sort_id')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'rkey')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'exp')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ico_class')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'is_using')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'published')->textInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

