<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */
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

                <?= $form->field($model, 'm_key')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'sort_id')->textInput(['maxlength' => true]) ?>

                <?=
                $form->field($model, 'parent_id')->widget(Select2::classname(), [
                    'data'          => $result['parent'],
                    'options'       => ['placeholder' => '选择...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?=
                $form->field($model, 'rp_key')->widget(Select2::classname(), [
                    'data'          => $result['role'],
                    'options'       => ['placeholder' => '选择菜单模型...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?=
                $form->field($model, 'model_key')->widget(Select2::classname(), [
                    'data'          => $result['menu_model'],
                    'options'       => ['placeholder' => '选择菜单模型...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?=
                $form->field($model, 'custom_key')->widget(Select2::classname(), [
                    'data'          => $result['pages'],
                    'options'       => ['placeholder' => '选择自定义页面对应的分类...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>


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

                    <?= Html::submitButton($model->isNewRecord ? '创建菜单' : '更新菜单', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

        <?= $this->render('../../formMsg'); ?>

    </section>
</div>

<script type="text/javascript">

    $('.field-menu-custom_key').hide();

    $('.field-menu-url').hide();

    $('#menu-model_key').on('change', function () {

        var selectVal = $(this).val();

        if (selectVal == 'UC1') {
            $('.field-menu-custom_key').show();

            // 链接
            $('.field-menu-url').hide();
            $('#menu-url').val('');
        }

        if (selectVal == 'UU1') {
            $('.field-menu-url').show();

            // 单页面
            $('.field-menu-custom_key').hide();
            $('#menu-custom_key').attr("checked", '');
        }

        if (selectVal != 'UC1' && selectVal != 'UU1') {

            // 单页面
            $('.field-menu-custom_key').hide();
            $('#menu-custom_key').attr("checked", "");

            // 链接
            $('.field-menu-url').hide();
            $('#menu-url').val('');
        }

        return true;
    });

</script>
