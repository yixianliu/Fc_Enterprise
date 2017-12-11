<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

    <table class="table table-hover">
        <tbody>
        <tr>
            <td>

                <?=
                $form->field($model, 'c_key')->widget(kartik\select2\Select2::classname(), [
                    'data'          => $result['classify'],
                    'options'       => ['placeholder' => '产品分类...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

            </td>
            <td><?= $form->field($model, 'content') ?></td>
            <td><?= $form->field($model, 'introduction') ?></td>
        </tr>
        </tbody>
    </table>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重设', ['class' => 'btn btn-default']) ?>
    </div>

<?php ActiveForm::end(); ?>