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

                <?=
                $form->field($model, 'type')->widget(Select2::classname(), [
                    'data'          => ['1' => '角色', '2' => '权限'],
                    'options'       => ['placeholder' => '选择角色权限...', 'disabled' => 'disabled'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?=
                $form->field($model, 'rule_name')->widget(Select2::classname(), [
                    'data'          => $result['rules'],
                    'options'       => ['placeholder' => '选择规则...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'description')->textarea(['maxlength' => true, 'rows' => 6]) ?>

                <div id="pkey" style='display:none;'>
                    <hr/>
                    <?= $form->field($model, 'p_key')->CheckBoxList($result['power'], ['value' => (empty($result['check']) ? null : $result['check'])]) ?>
                    <hr/>
                </div>

                <div class="form-group">

                    <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    <?= Html::a('返回列表', ['index', 'type' => 'role'], ['class' => 'btn btn-success']) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

        <?= $this->render('../../formMsg'); ?>

    </section>
</div>

<script type="text/javascript">

    <?php if ($model->type == 1): ?>
    $('#pkey').show();
    <?php endif; ?>

    $('#itemrp-type').on('change', function () {

        if ($(this).val() == 1) {
            $('#pkey').show();
        } else {
            $('#pkey').hide();
        }

        return true;
    });

</script>