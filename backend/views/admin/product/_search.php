<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

<table class="table table-hover">
    <tbody>
    <tr>
        <td><?= $form->field($model, 'product_id') ?></td>
        <td>

            <?=
            $form->field($model, 'c_key')->widget(Select2::classname(), [
                'data'          => $result['classify'],
                'options'       => ['placeholder' => '产品分类...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>

        </td>
        <td><?= $form->field($model, 'title') ?></td>
        <td><?= $form->field($model, 'content') ?></td>
        <td><?= $form->field($model, 'keywords') ?></td>
    </tr>
    </tbody>
</table>

<div class="form-group">
    <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('重设', ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>
