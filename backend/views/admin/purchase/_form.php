<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use phpnt\ICheck\ICheck;

/* @var $this yii\web\View */
/* @var $model common\models\Purchase */
/* @var $form yii\widgets\ActiveForm */

?>

<?php $this->registerCssFile( '@web/themes/assets/plugins/daterangepicker/css/daterangepicker-bs3.css' ); ?>
<?php $this->registerJsFile( '@web/themes/assets/plugins/daterangepicker/js/moment.min.js' ); ?>
<?php $this->registerJsFile( '@web/themes/assets/plugins/daterangepicker/js/daterangepicker.js' ); ?>

<div class="col-lg-12">

    <a class="btn btn-danger" data-toggle="modal" href="#ultraModal-3">状态配置</a>

    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode( $this->title ) ?></h2></header>

        <div class="content-body">
            <div class="row">

                <?php if (!empty( $result['classify'] ) && is_array( $result['classify'] )): ?>

                    <?php $form = ActiveForm::begin(); ?>

                    <?=
                    $form->field( $model, 'c_key' )->widget( Select2::classname(), [
                        'data'    => $result['classify'],
                        'options' => ['placeholder' => '采购分类...'],
                    ] );
                    ?>

                    <?= $form->field( $model, 'title' )->textInput( ['maxlength' => true] ) ?>

                    <?= $form->field( $model, 'price' )->textInput( ['maxlength' => true] ) ?>

                    <?=
                    $form->field( $model, 'start_at' )->textInput(
                        [
                            'class'                      => 'form-control daterange',
                            'data-format'                => 'YYYY/MM/DD hh:mm A',
                            'data-time-picker-increment' => 5,
                            'data-time-picker'           => 'true',
                        ] );
                    ?>

                    <?=
                    $form->field( $model, 'content' )->widget( 'kucha\ueditor\UEditor', [
                        'clientOptions' => [
                            //设置语言
                            'lang'               => 'zh-cn',
                            'initialFrameHeight' => '600',
                            'elementPathEnabled' => false,
                            'wordCount'          => false,
                        ],
                    ] );
                    ?>

                    <?= Yii::$app->view->renderFile( '@app/views/admin/upload.php', ['model' => $model, 'text' => '上传采购缩略图', 'attribute' => 'thumbnail', 'form' => $form, 'id' => $model->purchase_id, 'num' => 1] ); ?>

                    <?= Yii::$app->view->renderFile( '@app/views/admin/upload.php', ['model' => $model, 'text' => '采购相关图片', 'attribute' => 'images', 'form' => $form, 'id' => $model->purchase_id] ); ?>

                    <?= $form->field( $model, 'purchase_id' )->hiddenInput( ['value' => $model->purchase_id] )->label( false ); ?>

                    <div class="form-group">

                        <?= Html::submitButton( $model->isNewRecord ? '发布采购信息' : '更新采购信息', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'] ) ?>

                        <?= Html::a( '返回列表', ['index'], ['class' => 'btn btn-primary'] ) ?>

                    </div>

                    <div class="modal fade" id="ultraModal-3" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">高级配置</h4>
                                </div>

                                <div class="modal-body">

                                    <?= $form->field( $model, 'num' )->textInput( ['maxlength' => true] ) ?>

                                    <?= $form->field( $model, 'unit' )->textInput( ['maxlength' => true] ) ?>

                                    <?=
                                    $form->field( $model, 'is_type' )->widget( ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['Long' => '长期采购', 'Short' => '短期采购'],
                                        'color'   => 'red',                  // цвет
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_type' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_type' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]] )
                                    ?>

                                    <hr/>

                                    <?=
                                    $form->field( $model, 'is_status' )->widget( ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['On' => '采购中', 'Off' => '关闭'],
                                        'color'   => 'red',                  // цвет
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_status' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_status' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]] )
                                    ?>

                                    <hr/>

                                    <?=
                                    $form->field( $model, 'is_using' )->widget( ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['On' => '启用', 'Off' => '不启用'],
                                        'color'   => 'red',                  // цвет
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_using' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_using' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]] )
                                    ?>

                                    <hr/>

                                    <?=
                                    $form->field( $model, 'is_send_msg' )->widget( ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['On' => '群发供应商', 'Off' => '不群发'],
                                        'color'   => 'red',                  // цвет
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_send_msg' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_send_msg' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]] )
                                    ?>

                                    <hr/>

                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-danger" type="button">保存</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>

                <?php else: ?>

                    <h4>没有采购分类, 赶紧添加 <a href="<?= \yii\helpers\Url::to( ['admin/psb-cls/create', 'type' => 'Purchase', 'id' => 'P0'] ) ?>">采购分类</a></h4>

                <?php endif ?>

            </div>
        </div>
    </section>

    <?= $this->render( '../../formMsg' ); ?>

</div>
