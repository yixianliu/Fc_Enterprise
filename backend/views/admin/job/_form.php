<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use phpnt\ICheck\ICheck;

/* @var $this yii\web\View */
/* @var $model common\models\Job */
/* @var $form yii\widgets\ActiveForm */


?>

<style type="text/css">
    .preview img {
        width: 180px;
        height: 100px;
    }
</style>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">
                <?= Html::encode( $this->title ) ?>
            </h2>
        </header>
        <div class="content-body">
            <div class="row">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field( $model, 'title' )->textInput( ['maxlength' => true] ) ?>

                <?=
                $form->field( $model, 'content' )
                    ->widget( 'kucha\ueditor\UEditor', [
                        'clientOptions' => [
                            //设置语言
                            'lang'               => 'zh-cn',
                            'initialFrameHeight' => '600',
                            'elementPathEnabled' => false,
                            'wordCount'          => false,
                        ],
                    ] );
                ?>

                <?= $form->field( $model, 'keywords' )->textInput( ['maxlength' => true] ) ?>

                <?= Yii::$app->view->renderFile( '@app/views/admin/upload.php', ['model' => $model, 'text' => '招聘图片', 'form' => $form, 'attribute' => 'images', 'id' => $model->job_id] ); ?>

                <?= $form->field( $model, 'is_audit' )->widget( ICheck::className(), [
                    'type'    => ICheck::TYPE_RADIO_LIST,
                    'style'   => ICheck::STYLE_SQUARE,
                    'items'   => ['On' => '启用', 'Off' => '禁用'],
                    'color'   => 'red',                  // цвет
                    'options' => [
                        'item' => function ($index, $label, $name, $checked, $value) {
                            return '<input type="radio" id="is_audit' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_audit' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                        },
                    ]] );
                ?>

                <?= $form->field( $model, 'job_id' )->hiddenInput( ['value' => $model->job_id] )->label( false ); ?>

                <div class="form-group">

                    <?= Html::submitButton( $model->isNewRecord ? '发布招聘' : '更新招聘', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'] ) ?>

                    <?= Html::a( '返回列表', ['index'], ['class' => 'btn btn-primary'] ) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </section>

    <?= Yii::$app->view->renderFile( '@app/views/formMsg.php' ); ?>

</div>