<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\NavClassify */
/* @var $form yii\widgets\ActiveForm */

$result['classify'] = empty($result['classify']) ? array() : $result['classify'];

?>

<?php $this->registerCssFile('@web/themes/assets/plugins/icheck/skins/all.css'); ?>

<div class="col-lg-12">
    <section class="box ">

        <header class="panel_header">
            <h2 class="title pull-left"><?= Html::encode($this->title) ?></h2>
        </header>

        <div class="content-body">
            <div class="row">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'sort_id')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

                <?=
                $form->field($model, 'is_using')->widget(Select2::classname(), [
                    'data'          => ['On' => '开启', 'Off' => '关闭'],
                    'options'       => ['placeholder' => '选择...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

                <hr/>

                <?= $form->field($model, 'p_key')->CheckBoxList(\yii\helpers\ArrayHelper::map($result['classify'], 'c_key', 'name')) ?>

                <hr/>

                <div class="form-group">

                    <?= Html::submitButton($model->isNewRecord ? '发布导航分类' : '更新导航分类', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </section>

    <?= $this->render('../../formMsg'); ?>

</div>
