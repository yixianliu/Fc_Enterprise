<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
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

                <?= $form->field($model, 'user_id')->textInput(['maxlength' => true, 'readonly' => '']) ?>

                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                <?=
                $form->field($model, 'r_key')->widget(kartik\select2\Select2::classname(), [
                    'data'          => $result['role'],
                    'options'       => ['placeholder' => '角色...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?=
                $form->field($model, 'is_type')->widget(kartik\select2\Select2::classname(), [
                    'data'          => ['user' => '普通用户', 'enterprise' => '企业用户', 'supplier' => '供应商用户'],
                    'options'       => ['placeholder' => '用户类型...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?=
                $form->field($model, 'sex')->widget(kartik\select2\Select2::classname(), [
                    'data'          => ['Male' => '男', 'Female' => '女'],
                    'options'       => ['placeholder' => '性别...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

                <div class="form-group">

                    <?= Html::submitButton($model->isNewRecord ? '创建用户' : '更新用户', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </section>
</div>

