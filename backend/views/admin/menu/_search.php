<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MenuSearch */
/* @var $form yii\widgets\ActiveForm */
?>



<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

<table class="table table-hover">
    <tbody>
    <tr>

        <?= $form->field($model, 'm_key') ?>

        <?= $form->field($model, 'parent_id') ?>

        <?= $form->field($model, 'rp_key') ?>

        <?= $form->field($model, 'url') ?>

        <?= $form->field($model, 'name') ?>

        <?= $form->field($model, 'is_using') ?>

    </tr>
    </tbody>
</table>

<div class="form-group">
    <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('重设', ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>

