<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\RoleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]);
?>

<table class="table table-hover">
    <tbody>
    <tr>
        <td><?= $form->field($model, 'name') ?></td>
        <td>

            <?=
            $form->field($model, 'type')->widget(Select2::classname(), [
                'data'          => ['1' => '角色', '2' => '权限'],
                'options'       => ['placeholder' => '选择角色权限...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

        </td>
        <td><?= $form->field($model, 'rule_name') ?></td>
        <td><?= $form->field($model, 'data') ?></td>
        <td><?= $form->field($model, 'description') ?></td>
    </tr>
    </tbody>
</table>

<div class="form-group">
    <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('重设', ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>

