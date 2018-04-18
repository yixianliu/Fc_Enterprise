<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BidSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bid-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'c_key') ?>

    <?= $form->field($model, 'bid_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'path') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'is_send_msg') ?>

    <?php // echo $form->field($model, 'is_using') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
