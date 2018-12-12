<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use phpnt\ICheck\ICheck;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="col-lg-12">

    <a class="btn btn-danger" data-toggle="modal" href="#ultraModal-3">高级配置</a>

    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode( $this->title ) ?></h2></header>

        <div class="content-body">
            <div class="row">

                <?php if (!empty( $result['classify'] ) && is_array( $result['classify'] )): ?>

                    <?php $form = ActiveForm::begin(); ?>

                    <?=
                    $form->field( $model, 'c_key' )->widget( Select2::classname(), [
                        'data'          => $result['classify'],
                        'options'       => ['placeholder' => '新闻分类...'],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ] );
                    ?>

                    <?= $form->field( $model, 'title' )->textInput( ['maxlength' => true, 'placeholder' => '新闻的标题,千万不能直接复制..'] ) ?>

                    <?= Yii::$app->view->renderFile( '@app/views/admin/upload.php', ['model' => $model, 'text' => '上传缩略图', 'attribute' => 'thumbnail', 'form' => $form, 'id' => $model->news_id, 'num' => 1] ); ?>

                    <?=
                    $form->field( $model, 'content' )
                        ->widget( 'kucha\ueditor\UEditor', [
                            'clientOptions' => [
                                //设置语言
                                'lang'               => 'zh-cn',
                                'initialFrameHeight' => '600',
                                'elementPathEnabled' => false,
                                'wordCount'          => false,
                            ],
                        ] );
                    ?>

                    <?= Yii::$app->view->renderFile( '@app/views/admin/upload.php', ['model' => $model, 'text' => '上传新闻图片', 'attribute' => 'images', 'form' => $form, 'id' => $model->news_id] ); ?>

                    <div class="modal fade" id="ultraModal-3" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">高级配置</h4>
                                </div>

                                <div class="modal-body">

                                    <?= $form->field( $model, 'introduction' )->textarea( ['rows' => 6, 'maxlength' => true, 'placeholder' => '新闻导读,内容也是十分重要的...'] ) ?>

                                    <?= $form->field( $model, 'keywords' )->textInput( ['maxlength' => true, 'placeholder' => '可以为空,但最好填写,搜索引擎优化必须填写的...'] ) ?>

                                    <?= $form->field( $model, 'sort_id' )->textInput( ['maxlength' => true, 'placeholder' => '数值越大,越靠前...'] ) ?>

                                    <?= $form->field( $model, 'is_promote' )->widget( ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['On' => '启用', 'Off' => '禁用'],
                                        'color'   => 'red',
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_promote' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_promote' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]] );
                                    ?>

                                    <?= $form->field( $model, 'is_hot' )->widget( ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['On' => '启用', 'Off' => '禁用'],
                                        'color'   => 'red',
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_hot' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_hot' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]] );
                                    ?>

                                    <?= $form->field( $model, 'is_winnow' )->widget( ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['On' => '启用', 'Off' => '禁用'],
                                        'color'   => 'red',
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_winnow' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_winnow' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]] );
                                    ?>

                                    <?= $form->field( $model, 'is_recommend' )->widget( ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['On' => '启用', 'Off' => '禁用'],
                                        'color'   => 'red',
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_recommend' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_recommend' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]] );
                                    ?>

                                    <?= $form->field( $model, 'is_using' )->widget( ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['On' => '启用', 'Off' => '禁用'],
                                        'color'   => 'red',
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_using' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_using' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]] );
                                    ?>

                                    <?= $form->field( $model, 'is_comments' )->widget( ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['On' => '启用', 'Off' => '禁用'],
                                        'color'   => 'red',
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_comments' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_comments' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]] );
                                    ?>

                                    <?= $form->field( $model, 'is_img' )->widget( ICheck::className(), [
                                        'type'    => ICheck::TYPE_RADIO_LIST,
                                        'style'   => ICheck::STYLE_SQUARE,
                                        'items'   => ['On' => '启用', 'Off' => '禁用'],
                                        'color'   => 'red',
                                        'options' => [
                                            'item' => function ($index, $label, $name, $checked, $value) {
                                                return '<input type="radio" id="is_img' . $index . '" name="' . $name . '" value="' . $value . '" ' . ($checked ? 'checked' : false) . '> <label for="is_img' . $index . '">' . $label . '</label>&nbsp;&nbsp;';
                                            },
                                        ]] );
                                    ?>

                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-danger" type="button">保存</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?= $form->field( $model, 'user_id' )->hiddenInput( ['value' => Yii::$app->user->identity->username] )->label( false ); ?>

                    <?= $form->field( $model, 'news_id' )->hiddenInput( ['value' => $model->news_id] )->label( false ); ?>

                    <div class="form-group">

                        <?= Html::submitButton( $model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'] ) ?>

                        <?= Html::a( '返回列表', ['index'], ['class' => 'btn btn-primary'] ) ?>

                        <a class="btn btn-danger" data-toggle="modal" href="#ultraModal-3">高级配置</a>

                    </div>

                    <?php ActiveForm::end(); ?>

                <?php else: ?>

                    <h1>没有产品分类, 赶紧添加 <a href="<?= \yii\helpers\Url::to( ['admin/news-cls/create'] ) ?>">新闻分类</a></h1>

                <?php endif ?>

            </div>
        </div>
    </section>

    <?= Yii::$app->view->renderFile( '@app/views/formMsg.php' ); ?>

</div>

