<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use phpnt\ICheck\ICheck;

/* @var $this yii\web\View */
/* @var $model common\models\NewsClassify */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-lg-12">
    <section class="box ">

        <header class="panel_header">
            <h2 class="title pull-left"><?= Html::encode($this->title) ?></h2>
        </header>

        <div class="content-body">
            <div class="row">

                <?php $form = ActiveForm::begin(); ?>

                <?=
                $form->field($model, 'parent_id')->widget(Select2::classname(), [
                    'data'    => $result['classify'],
                    'options' => ['placeholder' => '父类...'],
                ]);
                ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?=
                $form->field($model, 'description')->widget('kucha\ueditor\UEditor', [
                        'clientOptions' => [
                            //设置语言
                            'lang'               => 'zh-cn',
                            'initialFrameHeight' => '600',
                            'elementPathEnabled' => false,
                            'wordCount'          => false,
                        ]
                    ]);
                ?>

                <?= $form->field($model, 'sort_id')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

                <?=
                $form->field( $model, 'is_using' )->widget( ICheck::className(), [
                    'type'    => ICheck::TYPE_RADIO_LIST,
                    'style'   => ICheck::STYLE_SQUARE,
                    'items'   => ['On' => '开启', 'Off' => '关闭'],
                    'color'   => 'red',
                    'options' => [
                        'item' => function ($index, $label, $name, $checked, $value) {
                            return '<input type="radio" id="coupon_type' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="coupon_type' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                        },
                    ]] )
                ?>

                <div class="form-group">

                    <?= Html::submitButton($model->isNewRecord ? '创建新闻分类' : '更新新闻分类', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </section>
</div>