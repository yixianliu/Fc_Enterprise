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
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true, 'readonly' => '']) ?>

                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'telphone')->textInput(['maxlength' => true]) ?>

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
                    $form->field($model, 'sex')->widget(kartik\select2\Select2::classname(), [
                        'data'          => ['Male' => '男', 'Female' => '女'],
                        'options'       => ['placeholder' => '性别...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

                    <?php if ($model->isNewRecord): ?>

                        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => true]) ?>

                    <?php else: ?>

                        <?= $form->field($model, 'newpassword')->passwordInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => true]) ?>

                    <?php endif; ?>

                    <div class="form-group">

                        <?= Html::submitButton($model->isNewRecord ? '创建用户' : '更新用户', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </section>
</div>

