<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PagesClassifySearch */
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
        <td><?= $form->field($model, 'sort_id') ?></td>
        <td><?= $form->field($model, 'name') ?></td>
        <td><?= $form->field($model, 'is_using') ?></td>
    </tr>
    </tbody>
</table>

<div class="form-group">
    <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('重设', ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>
