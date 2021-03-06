<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SlideSearch */
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
        <td><?= $form->field($model, 'path') ?></td>
        <td
        <?=
        $form->field($model, 'is_using')->widget(kartik\select2\Select2::classname(), [
            'data'          => ['On' => '启用', 'Off' => '未启用'],
            'options'       => ['placeholder' => '是否启用...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
        </td>

    </tr>
    </tbody>
</table>

<div class="form-group">
    <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('重设', ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>
