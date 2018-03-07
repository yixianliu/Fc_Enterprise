<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model common\models\Purchase */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '采购中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/themes/qijian/css/purchasing.css');
$this->registerCssFile('@web/themes/qijian/css/purzoom.css');

$this->registerJsFile('@web/themes/qijian/js/jquery1.42.min.js');
$this->registerJsFile('@web/themes/qijian/js/jquery.SuperSlide.2.1.1.js');
$this->registerJsFile('@web/themes/qijian/js/jqzoom/jquery.jqzoom.js');
$this->registerJsFile('@web/themes/qijian/js/jqzoom/base.js');

?>

<?= $this->render('../slide', ['pagekey' => 'purchase']); ?>

<!-- 内容中心 -->
<div class="container content">

    <!-- 当前位置 -->
    <?= $this->render('../nav'); ?>
    <!-- #当前位置 -->

    <!-- 可变化内容 -->
    <div class="conY">
        <div class="conY_tit"><?= $model->title ?></div>
        <div class="conY_dat">所有者：<?= $model->user_id ?>&nbsp;&nbsp;&nbsp;时间：<?= date('Y - m - d', $model->updated_at) ?></div>

        <div class="conY_text">

            <!-- 产品开始 -->
            <div class="right-extra">

                <!--产品参数开始-->
                <div class="tendcont">

                    <div class="tend-left">

                        <!-- 大图 -->
                        <div id="preview" class="spec-preview">

                            <span class="jqzoom">
                                <?= Html::img(Url::to('@web/themes/qijian/images/ser-left-1.jpg'), ['alt' => $this->title, 'jqimg' => Url::to('@web/themes/qijian/images/ser-left-1.jpg')]); ?>
                            </span>

                        </div>
                        <!-- #大图 -->

                        <!--缩图开始-->
                        <div class="spec-scroll">
                            <a class="prev"></a>
                            <a class="next"></a>
                            <div class="items">
                                <ul>
                                    <li>
                                        <?= Html::img(Url::to('@web/themes/qijian/images/ser-left-1.jpg'), ['alt' => $this->title, 'bimg' => Url::to('@web/themes/qijian/images/pro-1.jpg'), 'onmousemove' => 'preview(this);']); ?>
                                    </li>

                                    <li>
                                        <?= Html::img(Url::to('@web/themes/qijian/images/ser-left-1.jpg'), ['alt' => $this->title, 'bimg' => Url::to('@web/themes/qijian/images/pro-1.jpg'), 'onmousemove' => 'preview(this);']); ?>
                                    </li>

                                    <li>
                                        <?= Html::img(Url::to('@web/themes/qijian/images/ser-left-1.jpg'), ['alt' => $this->title, 'bimg' => Url::to('@web/themes/qijian/images/pro-1.jpg'), 'onmousemove' => 'preview(this);']); ?>
                                    </li>

                                    <li>
                                        <?= Html::img(Url::to('@web/themes/qijian/images/ser-left-1.jpg'), ['alt' => $this->title, 'bimg' => Url::to('@web/themes/qijian/images/pro-1.jpg'), 'onmousemove' => 'preview(this);']); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--缩图结束-->
                    </div>

                    <!-- 产品参数 -->
                    <div class="tend-right">

                        <p class="t-money"><span class="right-color">价格 : </span><font><?= $model->price ?></font></p>

                        <p>
                        <hr>
                        </p>

                        <?php
                        $form = ActiveForm::begin([
                            'action' => ['sp-offer/create', 'id' => 'P0', 'type' => 'Purchase'],
                            'method' => 'post',
                            'id'     => $modelOffer->formName(),
                        ]);
                        ?>

                        <p class="right-tar">
                            <span class="right-color">提交价格 : </span>
                            <?= $form->field($modelOffer, 'price')->textarea(['cols' => 50, 'rows' => 5])->label(false) ?>
                        </p>

                        <p>

                        <hr/>

                        <?=
                        FileUploadUI::widget([
                            'model'         => $model,
                            'attribute'     => 'path',
                            'url'           => ['admin/upload/image-upload', 'id' => $model->path, 'type' => 'sp_offer', 'attribute' => 'path'],
                            'gallery'       => false,
                            'fieldOptions'  => [
                                'accept' => 'file/*'
                            ],
                            'clientOptions' => [
                                'maxFileSize'      => 2000000,
                                'dataType'         => 'json',
                                'maxNumberOfFiles' => 5,
                            ],

                            // ...
                            'clientEvents'  => [

                                'fileuploaddone' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                                
                                var html = "";
                                
                                var ImagesContent = $("#ImagesContent");
                                
                                $.each(data.result.files, function (index, file) {
                                    html += file.name + \',\';
                                });
                                
                                html += ImagesContent.val();
                                
                                ImagesContent.val(html);
                                
                                return true;
                            }',
                                'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
                            ],
                        ]);
                        ?>

                        <?= $form->field($model, 'path')->textarea(['id' => 'ImagesContent', 'style' => 'display:none;'])->label(false) ?>

                        <hr/>

                        </p>

                        <p>
                            <?= Html::submitButton('提交价格', ['class' => 'btn btn-red']) ?>
                        </p>

                        <?php ActiveForm::end(); ?>

                    </div>
                    <!-- #产品参数 -->

                    <!-- 商家信息
                    <div class="tend-right-right">

                        <div class="tend-border">

                            <p class="t-title">湛江七建有限公司</p>

                            <p><span class="right-color">联系人 : </span>XXXX</p>
                            <p><span class="right-color">座机 : </span>XXX-XXXXXXXX</p>
                            <p><span class="right-color">手机 : </span>XXXXXXXXXXX</p>
                            <p><span class="right-color">QQ : </span>XXXXXXXXX</p>

                        </div>

                    </div>
                    <!-- #商家信息 -->

                </div>
                <!--产品参数结束-->

                <div style="clear:both;height:10px;"></div>

                <!-- 内容,评论 -->
                <div class="m" id="comment">
                    <!-- 切换按钮 -->
                    <ul class="tab clearfix">
                        <li onclick="tabs('#comment',0)" class="curr">
                            商品详情<strong></strong>
                        </li>
                    </ul>
                    <!-- #切换按钮 -->

                    <!-- 图文介绍 -->
                    <div class="mc tabcon" style="display:block;">
                        <div class="norecode">
                            <?= $model->content ?>
                        </div>
                    </div>
                    <!-- #图文介绍 -->

                </div>
                <!-- #内容,评论 -->

            </div>
            <!-- #产品结束 -->

        </div>

    </div>
    <!-- #可变化内容 -->

</div>