<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Management */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?></h2></header>
        <div class="content-body">
            <div class="row">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'login_ip')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'is_using')->textInput(['maxlength' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </section>

    <?= $this->render('../../formMsg'); ?>

</div>
