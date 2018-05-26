<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\RoleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$form = ActiveForm::begin(['action' => ['index'], 'method' => 'get',]); ?>

<div class="col-lg-12 col-md-12 col-sm-12">
    <section class="box ">

        <header class="panel_header">
            <h2 class="title pull-left">搜索内容</h2>
            <div class="actions panel_actions pull-right">
                <i class="box_toggle fa fa-chevron-down"></i>
                <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                <i class="box_close fa fa-times"></i>
            </div>
        </header>

        <div class="content-body">
            <div class="row ui-grids">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">

                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <?= $form->field($model, 'name') ?>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3">

                            <?=
                            $form->field($model, 'type')->widget(Select2::classname(), [
                                'data'          => ['1' => '角色', '2' => '权限'],
                                'options'       => ['placeholder' => '选择角色权限...'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                            ?>

                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <?= $form->field($model, 'rule_name') ?>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <?= $form->field($model, 'description') ?>
                        </div>

                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
                            <?= Html::resetButton('重设', ['class' => 'btn btn-default']) ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<?php ActiveForm::end(); ?>

