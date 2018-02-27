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
            <h2 class="title pull-left"><?= Html::encode($this->title) ?></h2>
        </header>

        <div class="content-body">
            <div class="row">

                <?php $form = ActiveForm::begin(); ?>

                <?=
                $form->field($model, 'parent_id')->widget(Select2::classname(), [
                    'data'          => $result['parent'],
                    'options'       => ['placeholder' => '选择...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'sort_id')->textInput(['maxlength' => true]) ?>

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

                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

                <div id="isType" class="form-group required">
                    <label class="control-label" for="pages-is_type">自定义页面类型</label>
                    <select id="is_type" class="form-control" name="is_type">
                        <option value="list">列表内容类型</option>
                        <option value="view">内容详情类型</option>
                        <option value="show">展示详情类型</option>
                    </select>
                </div>

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

    var ModelKey = $('#menu-model_key').val();

    $('.field-menu-url').hide();
    $('#isType').hide();

    if (ModelKey == 'UU1') {
        $('.field-menu-url').show();
    }

    if (ModelKey == 'UC1') {
        $('#isType').show();
    }

    $('#menu-model_key').on('change', function () {

        var selectVal = $(this).val();

        if (selectVal == 'UC1') {

            $('#isType').show();

            // 链接
            $('.field-menu-url').hide();
            $('#menu-url').val('');
        }

        if (selectVal == 'UU1') {
            $('.field-menu-url').show();

            // 单页面
            $('#isType').hide();
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
