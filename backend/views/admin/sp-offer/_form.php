<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\SpOffer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">
                <?= Html::encode($this->title) ?>
            </h2>
        </header>
        <div class="content-body">
            <div class="row">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'offer_id')->textInput(['maxlength' => true, 'readonly' => 'readonly']) ?>

                <?= $form->field($model, 'user_id')->textInput(['maxlength' => true, 'readonly' => 'readonly']) ?>

                <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

                <?=
                $form->field($model, 'is_type')->widget(Select2::classname(), [
                    'data'    => ['Supply' => '供应', 'Purchase' => '采购', 'Bid' => '投标'],
                    'options' => ['placeholder' => '审核', 'disabled' => 'disabled'],
                ]);
                ?>

                <?=
                $form->field($model, 'is_using')->widget(Select2::classname(), [
                    'data'    => ['On' => '采纳', 'Off' => '未采纳'],
                    'options' => ['placeholder' => '审核...'],
                ]);
                ?>

                <div class="form-group">

                    <?= Html::submitButton($model->isNewRecord ? '发布价格' : '更新价格', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

        <?= $this->render('resultImg', ['img' => $model->path, 'type' => 'sp-offer', 'user_id' => $model->user_id]); ?>

    </section>

    <?= $this->render('../../formMsg'); ?>

</div>