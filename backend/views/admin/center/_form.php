<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Conf */
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

                    <?= $form->field($model, 'c_key')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'parameter')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                    <?=
                    $form->field($model, 'is_using')->widget(Select2::classname(), [
                        'data'          => ['On' => '启用', 'Off' => '未启用'],
                        'options'       => ['placeholder' => '选择...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    <?=
                    $form->field($model, 'is_language')->widget(Select2::classname(), [
                        'data'          => ['cn' => '中文', 'en' => '英文'],
                        'options'       => ['placeholder' => '多语言...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                    <div class="form-group">

                        <?= Html::submitButton($model->isNewRecord ? '添加网站配置' : '更新网站配置', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                        <?= Html::a('返回列表', ['conf'], ['class' => 'btn btn-primary']) ?>

                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </section>
</div>


