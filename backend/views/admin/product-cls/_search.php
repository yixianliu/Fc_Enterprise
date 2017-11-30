<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\ProductClassifySearch */
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
        <td><?= $form->field($model, 'name') ?></td>
        <td><?= $form->field($model, 'keywords') ?></td>
        <td>
            <?=
            $form->field($model, 'parent_id')->widget(Select2::classname(), [
                'data'          => ['1' => '角色', '2' => '权限'],
                'options'       => ['placeholder' => '产品分类...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </td>

        <td>
            <?=
            $form->field($model, 'is_using')->widget(Select2::classname(), [
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
