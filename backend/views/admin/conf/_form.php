<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Conf */
/* @var $form yii\widgets\ActiveForm */

switch ($type) {

    case 'cn':
        $typeName = '中文';
        break;

    case 'en':
        $typeName = '英文';
        break;

    default:
        $typeName = '???';
        break;
}

?>

<div class="col-lg-12">
    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?> - <?= $typeName ?></h2></header>

        <div class="content-body">
            <div class="row">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'c_key')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?php if ( $model->is_type != 'images' ): ?>

                    <?= $form->field($model, 'parameter')->textarea(['rows' => 6]) ?>

                <?php else: ?>

                    <?= $this->render('../upload', ['model' => $model, 'form' => $form, 'attribute' => 'parameter', 'num' => 1, 'text' => '上传图片']); ?>

                <?php endif; ?>

                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

                <?=
                $form->field($model, 'is_using')->widget(Select2::classname(), [
                    'data'          => ['On' => '启用', 'Off' => '未启用'],
                    'options'       => ['placeholder' => '选择...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
                ?>

                <?=
                $form->field($model, 'is_language')->widget(Select2::classname(), [
                    'data'          => ['cn' => '中文', 'en' => '英文'],
                    'options'       => ['placeholder' => '多语言...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
                ?>

                <?=
                $form->field($model, 'is_type')->widget(Select2::classname(), [
                    'data'          => ['web' => '网站配置', 'images' => '图片配置', 'system' => '系统配置'],
                    'options'       => ['placeholder' => '配置类型...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
                ?>

                <div class="form-group">

                    <?= Html::submitButton($model->isNewRecord ? '添加网站配置' : '更新网站配置', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    <?= Html::a('返回列表', ['index', 'type' => (empty($type) ? \common\models\Conf::$webDefault : $type)], ['class' => 'btn btn-primary']) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

        <?= $this->render('../../formMsg'); ?>

    </section>
</div>

<script type="text/javascript">

    $('#conf-is_type').change(function () {


    })

</script>


