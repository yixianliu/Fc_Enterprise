<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */

$result['classify'] = empty($result['classify']) ? array() : $result['classify'];

?>

<?php $form = ActiveForm::begin(); ?>

<?=
$form->field($model, 'c_key')->widget(Select2::classname(), [
    'data'          => $result['classify'],
    'options'       => ['placeholder' => '新闻分类...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => '新闻的标题,千万不能直接复制..']) ?>

<?= $form->field($model, 'introduction')->textarea(['rows' => 6, 'maxlength' => true, 'placeholder' => '新闻导读,内容也是十分重要的...']) ?>

<?=
$form->field($model, 'content')
    ->widget('kucha\ueditor\UEditor', [
        'clientOptions' => [
            //设置语言
            'lang'               => 'zh-cn',
            'initialFrameHeight' => '600',
            'elementPathEnabled' => false,
            'wordCount'          => false,
        ]
    ])
    ->label(false);
?>

<?= $form->field($model, 'keywords')->textInput(['maxlength' => true, 'placeholder' => '可以为空,但最好填写,搜索引擎优化必须填写的...']) ?>

<?= $form->field($model, 'sort_id')->textInput(['maxlength' => true, 'placeholder' => '数值越大,越靠前...']) ?>

<?=
$form->field($model, 'is_promote')->widget(Select2::classname(), [
    'data'    => ['On' => '启用', 'Off' => '未启用'],
    'options' => ['placeholder' => '推广...'],
]);
?>

<?=
$form->field($model, 'is_hot')->widget(Select2::classname(), [
    'data'    => ['On' => '启用', 'Off' => '未启用'],
    'options' => ['placeholder' => '热门...'],
]);
?>

<?=
$form->field($model, 'is_winnow')->widget(Select2::classname(), [
    'data'    => ['On' => '启用', 'Off' => '未启用'],
    'options' => ['placeholder' => '精选...'],
]);
?>

<?=
$form->field($model, 'is_recommend')->widget(Select2::classname(), [
    'data'    => ['On' => '启用', 'Off' => '未启用'],
    'options' => ['placeholder' => '推荐...'],
]);
?>

<?=
$form->field($model, 'is_audit')->widget(Select2::classname(), [
    'data'    => ['On' => '启用', 'Off' => '未启用'],
    'options' => ['placeholder' => '审核...'],
]);
?>

<?=
$form->field($model, 'is_comments')->widget(Select2::classname(), [
    'data'    => ['On' => '启用', 'Off' => '未启用'],
    'options' => ['placeholder' => '评论...'],
]);
?>


<?=
$form->field($model, 'is_img')->widget(Select2::classname(), [
    'data'    => ['On' => '启用', 'Off' => '未启用'],
    'options' => ['placeholder' => '是否有上传图片...'],
]);
?>


<?=
$form->field($model, 'is_thumb')->widget(Select2::classname(), [
    'data'    => ['On' => '启用', 'Off' => '未启用'],
    'options' => ['placeholder' => '是否有生成缩略图...'],
]);
?>

<?= $form->field($model, 'news_id')->hiddenInput(['value' => time() . '_' . rand(0000, 9999)])->label(false); ?>

<?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->identity->user_id])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '发布新闻' : '更新新闻', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

<?= $this->render('../../form_msg'); ?>