<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\ItemRp */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?=

$form->field($model, 'type')->widget(Select2::classname(), [
    'data'          => ['1' => '角色', '2' => '权限'],
    'options'       => ['placeholder' => '选择角色权限...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

?>

<?= $form->field($model, 'rule_name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'description')->textarea(['maxlength' => true, 'rows' => 6]) ?>

<?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'updated_at')->textInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

