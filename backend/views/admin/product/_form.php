<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use phpnt\ICheck\ICheck;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */

if ( empty($result['classify']) ) {
    $result['classify'] = null;
}
?>

<div class="col-lg-12">

    <a class="btn btn-danger" data-toggle="modal" href="#ultraModal-3">高级配置</a>

    <a class="btn btn-danger" data-toggle="modal" href="#ultraModal-4">状态选择</a>

    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?></h2></header>

        <div class="content-body">
            <div class="row">

                <?php if ( !empty($result['classify']) && is_array($result['classify']) ): ?>

                    <?php $form = ActiveForm::begin(); ?>

                    <?=
                    $form->field($model, 'c_key')->widget(Select2::classname(), [
                        'data'          => $result['classify'],
                        'options'       => ['placeholder' => '选择产品分类...'],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]);
                    ?>

                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?=
                    $form->field($model, 'content')->widget('kucha\ueditor\UEditor', [
                        'clientOptions' => [
                            //设置语言
                            'lang'               => 'zh-cn',
                            'initialFrameHeight' => '600',
                            'elementPathEnabled' => false,
                            'wordCount'          => false,
                        ],
                    ]);
                    ?>

                    <?= $this->render('../upload', ['model' => $model, 'text' => '上传缩略图', 'form' => $form, 'id' => $model->product_id, 'num' => 1]); ?>

                    <?= $this->render('../upload', ['model' => $model, 'text' => '上传产品图片', 'form' => $form, 'id' => $model->product_id]); ?>

                    <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->identity->username])->label(false); ?>

                    <?= $form->field($model, 'product_id')->hiddenInput(['value' => $model->product_id])->label(false); ?>

                    <div class="form-group">

                        <?= Html::submitButton($model->isNewRecord ? '发布产品' : '更新产品', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>

                        <a class="btn btn-danger" data-toggle="modal" href="#ultraModal-3">高级配置</a>

                        <a class="btn btn-danger" data-toggle="modal" href="#ultraModal-4">状态选择</a>

                    </div>

                    <div class="modal fade" id="ultraModal-3" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">高级配置</h4>
                                </div>

                                <div class="modal-body">

                                    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($model, 'shop_url')->textarea(['maxlength' => true, 'rows' => 2]) ?>

                                    <?= $form->field($model, 'discount')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($model, 'introduction')->textarea(['maxlength' => true, 'rows' => 6]) ?>

                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-danger" type="button">保存</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="ultraModal-4" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">状态选择</h4>
                                </div>

                                <div class="modal-body">

                                    <?= $form->field($model, 'is_promote')->widget(ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['On' => '开启', 'Off' => '关闭'],
                                        'color'   => 'red',                  // цвет
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_promote' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_promote' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]])
                                    ?>

                                    <hr/>

                                    <?= $form->field($model, 'is_hot')->widget(ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['On' => '开启', 'Off' => '关闭'],
                                        'color'   => 'red',                  // цвет
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_hot' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_hot' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]])
                                    ?>

                                    <hr/>

                                    <?= $form->field($model, 'is_classic')->widget(ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['On' => '开启', 'Off' => '关闭'],
                                        'color'   => 'red',                  // цвет
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_classic' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_classic' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]])
                                    ?>

                                    <hr/>

                                    <?= $form->field($model, 'is_winnow')->widget(ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['On' => '开启', 'Off' => '关闭'],
                                        'color'   => 'red',                  // цвет
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_winnow' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_winnow' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]])
                                    ?>

                                    <hr/>

                                    <?= $form->field($model, 'is_recommend')->widget(ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['On' => '开启', 'Off' => '关闭'],
                                        'color'   => 'red',                  // цвет
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_recommend' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_recommend' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]])
                                    ?>

                                    <hr/>

                                    <?= $form->field($model, 'is_audit')->widget(ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['On' => '开启', 'Off' => '关闭'],
                                        'color'   => 'red',                  // цвет
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_audit' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_audit' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]])
                                    ?>

                                    <hr/>

                                    <?= $form->field($model, 'is_comments')->widget(ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['On' => '开启', 'Off' => '关闭'],
                                        'color'   => 'red',                  // цвет
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_comments' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_comments' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]])
                                    ?>

                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-danger" type="button">保存</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>

                <?php else: ?>

                    <h1>没有产品分类, 赶紧添加 <a href="<?= \yii\helpers\Url::to(['admin/product-cls/create']) ?>">产品分类</a></h1>

                <?php endif ?>

            </div>
        </div>
    </section>

    <?= $this->render('../../formMsg'); ?>

</div>