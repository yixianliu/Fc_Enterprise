<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\ItemRp */
/* @var $form yii\widgets\ActiveForm */

/**
 * 返回相关类型
 *
 * @param $type
 * @param $data
 * @return mixed
 */
function roleType($type, $data)
{

    if (empty($type) || empty($data) || !is_array($data))
        return false;

    // 初始化
    $array = array();

    foreach ($data as $value) {

        if (!strpos($value->name, $type))
            continue;

        $array[] = $value;
    }

    return $array;
}

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

                <div id="p_key">

                    <label class="form-label">控制面板</label>
                    <?= $form->field($model, 'p_key')->CheckBoxList(\yii\helpers\ArrayHelper::map(roleType('Center', $result['power']), 'name', 'description'))->label(false) ?>
                    <hr/>

                    <label class="form-label">产品功能</label>
                    <?= $form->field($model, 'p_key')->CheckBoxList(\yii\helpers\ArrayHelper::map(roleType('Product', $result['power']), 'name', 'description'))->label(false) ?>
                    <hr/>

                    <label class="form-label">新闻功能</label>
                    <?= $form->field($model, 'p_key')->CheckBoxList(\yii\helpers\ArrayHelper::map(roleType('News', $result['power']), 'name', 'description'))->label(false) ?>
                    <hr/>

                    <label class="form-label">采购功能</label>
                    <?= $form->field($model, 'p_key')->CheckBoxList(\yii\helpers\ArrayHelper::map(roleType('Purchase', $result['power']), 'name', 'description'))->label(false) ?>
                    <hr/>

                    <label class="form-label">招聘功能</label>
                    <?= $form->field($model, 'p_key')->CheckBoxList(\yii\helpers\ArrayHelper::map(roleType('Job', $result['power']), 'name', 'description'))->label(false) ?>
                    <hr/>

                    <label class="form-label">角色功能</label>
                    <?= $form->field($model, 'p_key')->CheckBoxList(\yii\helpers\ArrayHelper::map(roleType('Role', $result['power']), 'name', 'description'))->label(false) ?>
                    <hr/>

                    <label class="form-label">权限管理</label>
                    <?= $form->field($model, 'p_key')->CheckBoxList(\yii\helpers\ArrayHelper::map(roleType('Power', $result['power']), 'name', 'description'))->label(false) ?>
                    <hr/>

                    <label class="form-label">菜单管理</label>
                    <?= $form->field($model, 'p_key')->CheckBoxList(\yii\helpers\ArrayHelper::map(roleType('Menu', $result['power']), 'name', 'description'))->label(false) ?>
                    <hr/>

                    <label class="form-label">下载管理</label>
                    <?= $form->field($model, 'p_key')->CheckBoxList(\yii\helpers\ArrayHelper::map(roleType('Download', $result['power']), 'name', 'description'))->label(false) ?>
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

    $('#itemrp-type').on('change', function () {

        if ($(this).val() == 1) {
            $('#pkey').show();
        } else {
            $('#pkey').hide();
        }

        return true;
    });

</script>