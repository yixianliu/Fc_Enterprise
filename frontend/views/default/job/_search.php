<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\JobSearch */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

<?= $form->field($model, 'title') ?>

<?= $form->field($model, 'content') ?>

<?=
$form->field($model, 'is_audit')->widget(Select2::classname(), [
    'data'    => ['On' => '已审核', 'Off' => '未审核'],
    'options' => ['placeholder' => '审核状态...'],
]);
?>

<div class="form-group">
    <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('重设', ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>

