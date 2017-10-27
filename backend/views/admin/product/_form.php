<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'l_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 's_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'introduction')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'praise')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'forward')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'collection')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'share')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attention')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_promote')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_hot')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_classic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_winnow')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_recommend')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_audit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_field')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_comments')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_thumb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_grade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'published')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '发布产品' : '更新产品', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
