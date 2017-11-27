<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductClassifySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

<?= $form->field($model, 'c_key') ?>

<?= $form->field($model, 'sort_id') ?>

<?= $form->field($model, 'name') ?>

<?php // echo $form->field($model, 'description') ?>

<?= $form->field($model, 'keywords') ?>

<?php // echo $form->field($model, 'ico_class') ?>

<?php // echo $form->field($model, 'parent_id') ?>

<?php // echo $form->field($model, 'is_using') ?>

<div class="form-group">
    <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('重设', ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>
