<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model common\models\Purchase */
/* @var $form yii\widgets\ActiveForm */

?>

<section class="section-wrap blog-standard" style="padding: 60px 0">
    <div class="container relative">
        <div class="row">

            <div class="col-sm-3 sidebar blog-sidebar">
                <?= $this->render('../user/_left'); ?>
            </div>

            <div class="col-sm-9 blog-content">

                <?php $form = ActiveForm::begin(); ?>

                <?=
                $form->field($model, 'c_key')->widget(Select2::classname(), [
                    'data'    => $result['classify'],
                    'options' => ['placeholder' => '采购分类...'],
                ]);
                ?>

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?=
                $form->field($model, 'content')
                    ->widget('kucha\ueditor\UEditor', [
                        'clientOptions' => [
                            //设置语言
                            'lang'               => 'zh-cn',
                            'initialFrameHeight' => '600',
                            'elementPathEnabled' => false,
                            'wordCount'          => false,
                        ]
                    ]);
                ?>

                <?= $this->render('../upload', ['model' => $model, 'text' => '供应图片', 'form' => $form, 'attribute' => 'path', 'id' => $model->purchase_id]); ?>

                <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'num')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'start_at')->widget(
                    DatePicker::className(), [
                    'template'      => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format'    => 'dd-M-yyyy'
                    ]
                ]); ?>

                <?= $form->field($model, 'end_at')->widget(
                    DatePicker::className(), [
                    'template'      => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format'    => 'dd-M-yyyy'
                    ]
                ]); ?>

                <?=
                $form->field($model, 'is_type')->widget(Select2::classname(), [
                    'data'    => ['Long' => '长期采购', 'Short' => '短期采购'],
                    'options' => ['placeholder' => '采购类型...'],
                ]);
                ?>

                <?=
                $form->field($model, 'is_status')->widget(Select2::classname(), [
                    'data'    => ['On' => '采购中', 'Off' => '关闭'],
                    'options' => ['placeholder' => '采购状态...'],
                ]);
                ?>

                <div class="form-group">

                    <?= Html::submitButton($model->isNewRecord ? '发布采购信息' : '更新采购信息', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

        <?= Yii::$app->view->renderFile('@app/views/default/formMsg.php'); ?>

    </div>
</section>

