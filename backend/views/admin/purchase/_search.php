<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\PurchaseSearch */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

<table class="table table-hover">
    <tbody>
    <tr>
        <td><?= $form->field($model, 'title') ?></td>

        <td><?= $form->field($model, 'content') ?></td>

        <?php // echo $form->field($model, 'path') ?>

        <td><?= $form->field($model, 'price') ?></td>

        <td><?= $form->field($model, 'num') ?></td>

        <?php // echo $form->field($model, 'unit') ?>

        <td>
            <?=
            $form->field($model, 'type')->widget(Select2::classname(), [
                'data'    => ['Long' => '长期采购', 'Short' => '短期采购'],
                'options' => ['placeholder' => '采购类型...'],
            ]);
            ?>
        </td>

        <td>
            <?=
            $form->field($model, 'is_status')->widget(Select2::classname(), [
                'data'    => ['On' => '采购中', 'Off' => '关闭'],
                'options' => ['placeholder' => '采购状态...'],
            ]);
            ?>
        </td>

        <?php // echo $form->field($model, 'start_at') ?>

        <?php // echo $form->field($model, 'end_at') ?>

        <td>
            <?=
            $form->field($model, 'is_using')->widget(Select2::classname(), [
                'data'    => ['On' => '审核', 'Off' => '审核不过'],
                'options' => ['placeholder' => '是否启用...'],
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

