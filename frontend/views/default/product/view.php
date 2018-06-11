<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '产品中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$imgArray = explode(',', $model->path);

foreach ($imgArray as $key => $value) {
    if (empty($imgArray[$key]))
        unset($imgArray[$key]);
}

?>

<?= Html::cssFile('@web/themes/qijian/css/product.css') ?>
<?= Html::cssFile('@web/themes/qijian/css/prozoom.css') ?>
<?= Html::jsFile('@web/themes/qijian/js/jqzoom/jquery.jqzoom.js') ?>
<?= Html::jsFile('@web/themes/qijian/js/jqzoom/base.js') ?>

<?= $this->render('../_slide'); ?>

<!-- 内容中心 -->
<div class="container content">

    <!-- 当前位置 -->
    <?= $this->render('../_nav'); ?>
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

                        <?php if (!empty($imgArray)): ?>
                            <!-- 大图 -->
                            <div id="preview" class="spec-preview">
                            <span class="jqzoom">
                                <?= Html::img(Url::to('@web/../../backend/web/temp/product/' . $imgArray[0]), ['alt' => $model->title]); ?>
                            </span>
                            </div>
                            <!-- #大图 -->

                            <!--缩图开始-->
                            <div class="spec-scroll">
                                <a class="prev"></a>
                                <a class="next"></a>
                                <div class="items">
                                    <ul>

                                        <?php foreach ($imgArray as $value): ?>

                                            <li>
                                                <?= Html::img(Url::to('@web/../../backend/web/temp/product/' . $value), ['alt' => $model->title, 'onmousemove' => 'preview(this);']); ?>
                                            </li>

                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                            </div>
                            <!--缩图结束-->
                        <?php else: ?>

                            <?= Html::img(Url::to('@web/themes/qijian/images/ser-left-1.jpg'), ['alt' => $model->title, 'width' => 400, 'height' => 280]); ?>

                        <?php endif; ?>

                    </div>

                    <!-- 产品参数 -->
                    <div class="tend-right">
                        <p>产品价格: <?= $model->price ?></p>
                        <p>产品折扣价: <?= $model->discount ?></p>
                        <p><?= $model->introduction ?></p>
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
