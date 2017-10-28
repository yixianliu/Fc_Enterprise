<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */

if (empty($result['classify'])) {
    $result['classify'] = null;
}
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?=

    $form->field($model, 'c_key')->widget(Select2::classname(), [
        'data'          => $result['classify'],
        'options'       => ['placeholder' => '选择产品分类...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

    ?>

    <?=

    $form->field($model, 's_key')->widget(Select2::classname(), [
        'data'          => $result['section'],
        'options'       => ['placeholder' => '选择版块...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

    ?>

    <?= $form->field($model, 'l_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'introduction')->textarea(['maxlength' => true, 'rows' => 6]) ?>

    <?=
    $form->field($model, 'content')->widget('kucha\ueditor\UEditor',[
        'clientOptions' => [
            //编辑区域大小
            'initialFrameHeight' => '400',
            //设置语言
            'lang'               => 'zh-cn',
            //定制菜单
            'toolbars'           => [
                [
                    'fullscreen', 'source', 'undo', 'redo', '|',
                    'fontsize',
                    'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat',
                    'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|',
                    'forecolor', 'backcolor', '|',
                    'lineheight', '|',
                    'indent', '|'
                ],
            ],
        ]
    ]);
    ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'praise')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'forward')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'collection')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'share')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attention')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_promote')->textInput(['maxlength' => true]) ?>

    <?=

    $form->field($model, 'is_hot')->widget(Select2::classname(), [
        'data'          => ['On' => '开启', 'Off' => '关闭'],
        'options'       => ['placeholder' => '选择产品分类...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);

    ?>

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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '发布产品' : '更新产品', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
