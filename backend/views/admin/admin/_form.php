<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Management */
/* @var $form yii\widgets\ActiveForm */

$roleData = array();

if (!empty($result['role'])) {

    foreach ($result['role'] as $value) {
        $roleData[ $value->name ] = $value->description;
    }

}

?>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?></h2></header>
        <div class="content-body">
            <div class="row">

                <?php $form = ActiveForm::begin(); ?>

                <?php if (empty($model->username)): ?>

                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

                <?php endif; ?>

                <?=
                $form->field($model, 'item_name')->widget(Select2::classname(), [
                    'data'          => $roleData,
                    'options'       => ['placeholder' => '选择...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'login_ip')->textInput(['maxlength' => true]) ?>

                <?=
                $form->field($model, 'is_using')->widget(Select2::classname(), [
                    'data'          => ['On' => '启用', 'Off' => '未启用'],
                    'options'       => ['placeholder' => '选择...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <div class="form-group">

                    <?= Html::submitButton($model->isNewRecord ? '保存' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </section>

    <?= $this->render('../../formMsg'); ?>

</div>
