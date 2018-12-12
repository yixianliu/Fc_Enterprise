<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use phpnt\ICheck\ICheck;

/* @var $this yii\web\View */
/* @var $model common\models\Slide */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="col-lg-12">
    <section class="box ">
        
        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode( $this->title ) ?></h2></header>

        <div class="content-body">
            <div class="row">

                <?php $form = ActiveForm::begin( ['options' => ['enctype' => 'multipart/form-data']] ); ?>

                <?=
                $form->field( $model, 'c_key' )->widget( kartik\select2\Select2::classname(), [
                    'data'          => $result['page'],
                    'options'       => ['placeholder' => '选择相对应的页面...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ] );
                ?>

                <?= Yii::$app->view->renderFile( '@app/views/admin/upload.php', ['model' => $model, 'form' => $form, 'text' => '幻灯片图片上传'] ); ?>

                <?= $form->field( $model, 'description' )->textarea( ['rows' => 6] ) ?>

                <?= $form->field( $model, 'is_using' )->widget( ICheck::className(), [
                    'type'    => ICheck::TYPE_RADIO_LIST,
                    'style'   => ICheck::STYLE_SQUARE,
                    'items'   => ['On' => '开启', 'Off' => '关闭'],
                    'color'   => 'red',                  // цвет
                    'options' => [
                        'item' => function ($index, $label, $name, $checked, $value) {
                            return '<input type="radio" id="is_using' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_using' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                        },
                    ]] )
                ?>

                <div class="form-group">

                    <?= Html::submitButton( $model->isNewRecord ? '创建幻灯片' : '更新幻灯片', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'] ) ?>

                    <?= Html::a( '返回列表', ['index'], ['class' => 'btn btn-primary'] ) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </section>

    <?= Yii::$app->view->renderFile( '@app/views/formMsg.php' ); ?>

</div>
