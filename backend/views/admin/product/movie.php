<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/12/18
 * Time: 9:29
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use phpnt\ICheck\ICheck;

$this->title = '移动分类';

?>

<?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-12">
        <section class="box ">

            <header class="panel_header"><h2 class="title pull-left"><?= Html::encode( $this->title ) ?></h2></header>

            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>缩略图</th>
                                <th>产品名称</th>
                                <th>评论状态</th>
                                <th>审核状态</th>
                                <th>热门状态</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($result['data'] as $value): ?>
                                <tr>
                                    <th scope="row"><?= $value->id ?></th>
                                    <td><img src="<?= $value->thumbnail ?>" width="320" height="170"></td>
                                    <td><?= $value->title ?></td>
                                    <td><?= $value->is_comments ?></td>
                                    <td><?= $value->is_using ?></td>
                                    <td><?= $value->is_hot ?></td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="well primary">
                    <h3>Perspective, Similarity <span class="semi-bold">&amp; Contrast</span>, <i>Rhythm</i></h3>
                    这下面的内容可以进行统一的修改!
                </div>

                <?=
                $form->field( $model, 'c_key' )->widget( Select2::classname(), [
                    'data'          => $result['classify'],
                    'options'       => ['placeholder' => '选择产品分类...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ] );
                ?>

                <?=
                $form->field( $model, 'is_promote' )->widget( ICheck::className(), [
                    'type'    => ICheck::TYPE_RADIO_LIST,
                    'style'   => ICheck::STYLE_SQUARE,
                    'items'   => ['On' => '开启', 'Off' => '关闭'],
                    'color'   => 'red',                  // цвет
                    'options' => [
                        'item' => function ($index, $label, $name, $checked, $value) {
                            return '<input type="radio" id="is_promote' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_promote' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                        },
                    ]] )
                ?>

                <?=
                $form->field( $model, 'is_hot' )->widget( ICheck::className(), [
                    'type'    => ICheck::TYPE_RADIO_LIST,
                    'style'   => ICheck::STYLE_SQUARE,
                    'items'   => ['On' => '开启', 'Off' => '关闭'],
                    'color'   => 'red',                  // цвет
                    'options' => [
                        'item' => function ($index, $label, $name, $checked, $value) {
                            return '<input type="radio" id="is_hot' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_hot' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                        },
                    ]] )
                ?>

                <?=
                $form->field( $model, 'is_classic' )->widget( ICheck::className(), [
                    'type'    => ICheck::TYPE_RADIO_LIST,
                    'style'   => ICheck::STYLE_SQUARE,
                    'items'   => ['On' => '开启', 'Off' => '关闭'],
                    'color'   => 'red',                  // цвет
                    'options' => [
                        'item' => function ($index, $label, $name, $checked, $value) {
                            return '<input type="radio" id="is_classic' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_classic' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                        },
                    ]] )
                ?>

                <?=
                $form->field( $model, 'is_winnow' )->widget( ICheck::className(), [
                    'type'    => ICheck::TYPE_RADIO_LIST,
                    'style'   => ICheck::STYLE_SQUARE,
                    'items'   => ['On' => '开启', 'Off' => '关闭'],
                    'color'   => 'red',                  // цвет
                    'options' => [
                        'item' => function ($index, $label, $name, $checked, $value) {
                            return '<input type="radio" id="is_winnow' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_winnow' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                        },
                    ]] )
                ?>

                <?=
                $form->field( $model, 'is_recommend' )->widget( ICheck::className(), [
                    'type'    => ICheck::TYPE_RADIO_LIST,
                    'style'   => ICheck::STYLE_SQUARE,
                    'items'   => ['On' => '开启', 'Off' => '关闭'],
                    'color'   => 'red',                  // цвет
                    'options' => [
                        'item' => function ($index, $label, $name, $checked, $value) {
                            return '<input type="radio" id="is_recommend' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_recommend' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                        },
                    ]] )
                ?>

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

                <?=
                $form->field( $model, 'is_comments' )->widget( ICheck::className(), [
                    'type'    => ICheck::TYPE_RADIO_LIST,
                    'style'   => ICheck::STYLE_SQUARE,
                    'items'   => ['On' => '开启', 'Off' => '关闭'],
                    'color'   => 'red',                  // цвет
                    'options' => [
                        'item' => function ($index, $label, $name, $checked, $value) {
                            return '<input type="radio" id="is_comments' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_comments' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                        },
                    ]] )
                ?>

                <div class="form-group">

                    <?= Html::submitButton( '统一保存设置', ['class' => 'btn btn-primary'] ) ?>

                    <?= Html::a( '返回列表', ['index'], ['class' => 'btn btn-primary'] ) ?>

                </div>

            </div>
        </section>
    </div>

<?php ActiveForm::end(); ?>