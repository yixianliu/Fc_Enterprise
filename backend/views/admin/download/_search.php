<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\DownloadSearch */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

<table class="table">
    <tbody>
    <tr>

        <td><?= $form->field($model, 'c_key') ?></td>

        <td><?= $form->field($model, 'title') ?></td>

        <td><?= $form->field($model, 'path') ?></td>

        <td><?= $form->field($model, 'content') ?></td>

        <td>

            <?= $form->field($model, 'is_using') ?>

        </td>

    </tr>
    </tbody>
</table>

<div class="form-group">
    <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('重设', ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>

