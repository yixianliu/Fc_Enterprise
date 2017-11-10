<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'news_id')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'c_key')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'sort_id')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<?=
$form->field($model, 'content')
    ->widget('kucha\ueditor\UEditor', [
        'clientOptions' => [
            // 编辑区域大小
            'initialFrameHeight' => '400',
            'elementPathEnabled' => false,
            'wordCount'          => false,
        ]
    ])
    ->label(false);
?>

<?= $form->field($model, 'introduction')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'praise')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'forward')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'collection')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'share')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'attention')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'is_promote')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'is_hot')->textInput(['maxlength' => true]) ?>

<?=
$form->field($model, 'is_winnow')->widget(Select2::classname(), [
    'data'    => ['On' => '启用', 'Off' => '未启用'],
    'options' => ['placeholder' => '精选状态...'],
]);
?>

<?= $form->field($model, 'is_recommend')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'is_audit')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'is_comments')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'is_img')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'is_thumb')->textInput(['maxlength' => true]) ?>

<?php if (!$model->isNewRecord): ?>
    <?= $form->field($model, 'published')->textInput(['maxlength' => true]) ?>
<?php endif; ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? '发布新闻' : '更新新闻', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

