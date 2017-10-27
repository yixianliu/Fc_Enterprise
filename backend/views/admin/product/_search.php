<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'l_key') ?>

    <?= $form->field($model, 'c_key') ?>

    <?php // echo $form->field($model, 's_key') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'introduction') ?>

    <?php // echo $form->field($model, 'keywords') ?>

    <?php // echo $form->field($model, 'path') ?>

    <?php // echo $form->field($model, 'praise') ?>

    <?php // echo $form->field($model, 'forward') ?>

    <?php // echo $form->field($model, 'collection') ?>

    <?php // echo $form->field($model, 'share') ?>

    <?php // echo $form->field($model, 'attention') ?>

    <?php // echo $form->field($model, 'is_promote') ?>

    <?php // echo $form->field($model, 'is_hot') ?>

    <?php // echo $form->field($model, 'is_classic') ?>

    <?php // echo $form->field($model, 'is_winnow') ?>

    <?php // echo $form->field($model, 'is_recommend') ?>

    <?php // echo $form->field($model, 'is_audit') ?>

    <?php // echo $form->field($model, 'is_field') ?>

    <?php // echo $form->field($model, 'is_comments') ?>

    <?php // echo $form->field($model, 'is_img') ?>

    <?php // echo $form->field($model, 'is_thumb') ?>

    <?php // echo $form->field($model, 'grade') ?>

    <?php // echo $form->field($model, 'user_grade') ?>

    <?php // echo $form->field($model, 'published') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
