<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\ItemRp */
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

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <blockquote class="purple background">
                    <p>是权限的话,必须是函数 + 控制器,例子: indexJob (控制器是为大写)</p>
                    <small>友情提示 !!</small>
                </blockquote>

                <?=
                $form->field($model, 'type')->widget(Select2::classname(), [
                    'data'          => ['1' => '角色', '2' => '权限'],
                    'options'       => ['placeholder' => '选择角色权限...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?= $form->field($model, 'rule_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'description')->textarea(['maxlength' => true, 'rows' => 6]) ?>

                <div class="form-group">

                    <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    <?= Html::a('返回列表', ['index', 'type' => 'role'], ['class' => 'btn btn-success']) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </section>
</div>
