<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '产品中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('../slide', ['pagekey' => 'purchase']); ?>

<?= $this->render('../nav'); ?>

<section class="section-wrap-mp portfolio-single">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div id="owl-slider-one-img" class="owl-carousel owl-theme oh">

                    <div class="item">
                        <a href="#">
                            <img src="<?= Url::to('@web/themes/enterprise/img') ?>/project_1.jpg" alt="">
                        </a>
                    </div>

                    <div class="item">
                        <a href="#">
                            <img src="<?= Url::to('@web/themes/enterprise/img') ?>/project_2.jpg" alt="">
                        </a>
                    </div>

                    <div class="item">
                        <a href="#">
                            <img src="<?= Url::to('@web/themes/enterprise/img') ?>/project_3.jpg" alt="">
                        </a>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="portfolio-description">
                    <h2><?= $model->title ?></h2>
                    <p><?= $model->introduction ?></p>
                    <ul>
                        <li><span>Date:</span> 15 May, 2015</li>
                        <li><span>Category:</span><a href="#"> Mockups</a></li>
                        <li><span>Client:</span><a href="#"> Envato</a></li>
                    </ul>
                    <a href="#" class="btn btn-sm btn-dark">View Project</a>
                    <div class="entry-share clearfix">
                        <h6>Share:</h6>
                        <div class="socials">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>
            </div> <!-- end description -->

        </div>

        <br/><br/><br/>

        <div class="row">
            <div class="col-md-12">
                <?= $model->content ?>
            </div>

        </div>
    </div>
</section>

<section class="related-projects pb-90">
    <div class="container">

        <hr/>

        <h4 class="heading-inline">推荐产品</h4>
        <div class="customNavigation right">
            <a class="btn prev"><i class="fa fa-angle-left"></i></a>
            <a class="btn next"><i class="fa fa-angle-right"></i></a>
        </div>
        <div class="row mt-20">

            <div id="owl-related-works" class="owl-carousel owl-theme">

                <div class="work-item mockups branding">
                    <div class="work-container">
                        <div class="work-img">
                            <img src="<?= Url::to('@web/themes/enterprise/img') ?>/project_5.jpg" alt="">
                            <div class="portfolio-overlay">
                                <div class="project-icons">
                                    <a href="<?= Url::to('@web/themes/enterprise/img') ?>/project_5_big.jpg" class="lightbox-gallery" title="Cup Mockup"><i class="fa fa-search"></i></a>
                                    <a href="portfolio-single.html" class="project-icon"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="work-description">
                            <h3><a href="#">Cup Mockup</a></h3>
                            <span><a href="#">Branding</a></span>
                        </div>
                    </div>
                </div> <!-- end work-item -->

                <div class="work-item branding print">
                    <div class="work-container">
                        <div class="work-img">
                            <img src="<?= Url::to('@web/themes/enterprise/img') ?>/project_2.jpg" alt="">
                            <div class="portfolio-overlay">
                                <div class="project-icons">
                                    <a href="http://vimeo.com/19270640" class="lightbox-gallery mfp-iframe"><i class="fa fa-search"></i></a>
                                    <a href="portfolio-single.html" class="project-icon"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="work-description">
                            <h3><a href="#">Vimeo Lightbox</a></h3>
                            <span><a href="#">Branding</a></span>
                        </div>
                    </div>
                </div> <!-- end work-item -->

                <div class="work-item branding">
                    <div class="work-container">
                        <div class="work-img">
                            <img src="<?= Url::to('@web/themes/enterprise/img') ?>/project_3.jpg" alt="">
                            <div class="portfolio-overlay">
                                <div class="project-icons">
                                    <a href="https://www.youtube.com/watch?v=Scxs7L0vhZ4?autoplay=1" class="lightbox-gallery mfp-iframe"><i class="fa fa-search"></i></a>
                                    <a href="portfolio-single.html" class="project-icon"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="work-description">
                            <h3><a href="#">Youtube Lightbox</a></h3>
                            <span><a href="#">Branding</a></span>
                        </div>
                    </div>
                </div> <!-- end work-item -->

                <div class="work-item print mockups">
                    <div class="work-container">
                        <div class="work-img">
                            <img src="<?= Url::to('@web/themes/enterprise/img') ?>/project_4.jpg" alt="">
                            <div class="portfolio-overlay">
                                <div class="project-icons">
                                    <a href="<?= Url::to('@web/themes/enterprise/img') ?>/project_4_big.jpg" class="lightbox-gallery" title="Brod Identity"><i class="fa fa-search"></i></a>
                                    <a href="portfolio-single.html" class="project-icon"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="work-description">
                            <h3><a href="#">Brod Identity</a></h3>
                            <span><a href="#">Branding</a></span>
                        </div>
                    </div>
                </div> <!-- end work-item -->

            </div> <!-- end owl carousel-->
        </div>
    </div>
</section> <!-- end related projects-->

<!-- 内容中心 -->
<div class="container content">

    <!-- 当前位置 -->
    <div class="location">
        <font>全部产品</font>
        <span>当前位置：<a title="" href="">首页</a> &gt; <a title="" href="">产品中心</a> &gt; <a title="" href="">产品中心</a> &gt;</span>
    </div>
    <!-- #当前位置 -->

    <!-- 可变化内容 -->
    <div class="conY">
        <div class="conY_tit">七建产品</div>
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
                            湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建湛江七建
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
