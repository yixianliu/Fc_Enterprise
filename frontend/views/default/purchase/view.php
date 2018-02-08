<?php

use yii\helpers\Url;
use yii\helpers\Html;

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


<!-- 商城分类 -->
<div class="container-fluid classfi-bg">
    <div class="container shop-classfiy">
        <?= $this->render('_cls'); ?>
    </div>
</div>
<!-- 商城分类 -->

<?= $this->render('../slide', ['pagekey' => 'purchase']); ?>

<!-- 内容中心 -->
<div class="container content">

    <!-- 当前位置 -->
    <?= $this->render('../nav'); ?>
    <!-- #当前位置 -->

    <!-- 可变化内容 -->
    <div class="conY">
        <div class="conY_tit">七建订单</div>
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
                                            <img alt="" jqimg="images/ser-left-1.jpg" src="images/ser-left-1.jpg"/>
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
                                        <img alt="" bimg="images/pro-1.jpg" src="images/ser-left-1.jpg" onmousemove="preview(this);">
                                    </li>

                                    <li>
                                        <img alt="" bimg="images/pro-1.jpg" src="images/ser-left-2.jpg" onmousemove="preview(this);">
                                    </li>

                                    <li>
                                        <img alt="" bimg="images/pro-1.jpg" src="images/ser-right-1.jpg" onmousemove="preview(this);">
                                    </li>

                                    <li>
                                        <img alt="" bimg="images/pro-1.jpg" src="images/ser-right-2.jpg" onmousemove="preview(this);">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--缩图结束-->
                    </div>

                    <!-- 产品参数 -->
                    <div class="tend-right">
                        <p class="t-money"><span class="right-color">价格 : </span><font>1111</font></p>
                        <p><span class="right-color">交货周期 : </span>7天</p>
                        <p><span class="right-color">销售范围 : </span>中国</p>
                        <p><span class="right-color">免费拿样 : </span>是</p>
                        <p>
                        <hr>
                        </p>
                        <p class="right-tar">
                            <span class="right-color">询价信 : </span><textarea cols="50" rows="5" tabindex="4"></textarea>
                        </p>
                        <p>
                            <a class="btn btn-red" title="" href="">
                                发送
                            </a>
                        </p>
                    </div>
                    <!-- #产品参数 -->

                    <!-- 商家信息 -->
                    <div class="tend-right-right">

                        <div class="tend-border">

                            <p class="t-title">湛江七建有限公司</p>

                            <p><span class="right-color">联系人 : </span>XXXX</p>
                            <p><span class="right-color">座机 : </span>XXX-XXXXXXXX</p>
                            <p><span class="right-color">手机 : </span>XXXXXXXXXXX</p>
                            <p><span class="right-color">QQ : </span>XXXXXXXXX</p>

                        </div>

                        <div class="tend-border-btn">
                            <a class="btn btn-default" title="" href="">
                                进入空间
                            </a>

                            <a class="btn btn-default" title="" href="">
                                关注商家
                            </a>
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
                            <?= $model->title ?>
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