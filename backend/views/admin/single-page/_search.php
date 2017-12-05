<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SinglePageSearch */
/* @var $form yii\widgets\ActiveForm */
?>



<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

<table class="table table-hover">
    <tbody>
    <tr>
        <td><?= $form->field($model, 'page_id') ?></td>
        <td><?= $form->field($model, 'name') ?></td>
        <td><?= $form->field($model, 'content') ?></td>
        <td><?= $form->field($model, 'path') ?></td>
        <td><?= $form->field($model, 'is_using') ?></td>
    </tr>
    </tbody>
</table>


<div class="form-group">
    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>

