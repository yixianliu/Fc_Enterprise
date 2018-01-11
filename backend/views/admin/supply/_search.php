<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SupplySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

<table class="table table-hover">
    <tbody>
    <tr>

        <td><?= $form->field($model, 'c_key') ?></td>

        <td><?= $form->field($model, 'supply_id') ?></td>

        <td><?= $form->field($model, 'user_id') ?></td>

        <td><?= $form->field($model, 'title') ?></td>

        <td><?= $form->field($model, 'content') ?></td>

    </tr>
    </tbody>
</table>

<div class="form-group">
    <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('重设', ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>


