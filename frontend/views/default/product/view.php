<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '产品中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

// $this->registerCssFile('@web/themes/qijian/css/product.css');
// $this->registerCssFile('@web/themes/qijian/css/prozoom.css');
// $this->registerJsFile('@web/themes/qijian/js/jquery1.42.min.js');
// $this->registerJsFile('@web/themes/qijian/js/jquery.SuperSlide.2.1.1.js');
// $this->registerJsFile('@web/themes/qijian/js/jquery.jqzoom.js');
// $this->registerJsFile('@web/themes/qijian/js/base.js');

?>

<?=Html::cssFile('@web/themes/qijian/css/product.css')?>

<?=Html::cssFile('@web/themes/qijian/css/prozoom.css')?>

<?=Html::jsFile('@web/themes/qijian/js/jqzoom/jquery.jqzoom.js')?>

<?=Html::jsFile('@web/themes/qijian/js/jqzoom/base.js')?>

<?= $this->render('../slide', ['pagekey' => 'product']); ?>

<!-- 内容中心 -->
<div class="container content">

    <!-- 当前位置 -->
    <?= $this->render('../nav'); ?>
    <!-- #当前位置 -->

    <!-- 可变化内容 -->
    <div class="conY">
        <div class="conY_tit"><?= $model->title ?></div>
        <div class="conY_dat">作者：admin&nbsp;&nbsp;&nbsp;时间：2018-1-30</div>

        <div class="conY_text">

            <!-- 产品开始 -->
            <div class="right-extra">

                <!--产品参数开始-->
                <div class="tendcont">
                    <div class="tend-left">
                        <!-- 大图 -->
                        <div id="preview" class="spec-preview">
                                        <span class="jqzoom">
                                            <?= Html::img(Url::to('@web/themes/qijian/images/ser-left-1.jpg'), ['alt' => $model->title]); ?>
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
                                        <?= Html::img(Url::to('@web/themes/qijian/images/ser-left-1.jpg'), ['alt' => $model->title, 'onmousemove' => 'preview(this);']); ?>
                                    </li>

                                    <li>
                                        <?= Html::img(Url::to('@web/themes/qijian/images/ser-left-2.jpg'), ['alt' => $model->title, 'onmousemove' => 'preview(this);']); ?>
                                    </li>

                                    <li>
                                        <?= Html::img(Url::to('@web/themes/qijian/images/ser-right-1.jpg'), ['alt' => $model->title, 'onmousemove' => 'preview(this);']); ?>
                                    </li>

                                    <li>
                                        <?= Html::img(Url::to('@web/themes/qijian/images/ser-right-2.jpg'), ['alt' => $model->title, 'onmousemove' => 'preview(this);']); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--缩图结束-->
                    </div>

                    <!-- 产品参数 -->
                    <div class="tend-right">
                        <p>产品参数: 12cm * 12cm</p>
                        <p>产品参数: 12cm * 12cm</p>
                        <p>产品参数: 12cm * 12cm</p>
                        <p>产品参数: 12cm * 12cm</p>
                        <p>产品参数: 12cm * 12cm</p>
                    </div>
                    <!-- #产品参数 -->
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
<!-- #内容中心 -->
