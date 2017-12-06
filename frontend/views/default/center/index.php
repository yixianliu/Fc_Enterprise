<?php
/**
 *
 * 首页模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/10/13
 * Time: 9:43
 */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = '首页';

?>



    <!-- Revolution Slider -->
    <section>
        <div class="rev_slider_wrapper">
            <div class="rev_slider" id="slider2" data-version="5.0">
                <ul>
                    <!-- SLIDE 1 -->
                    <li
                            data-fstransition="fade"
                            data-transition="cube"
                            data-easein="default"
                            data-easeout="default"
                            data-slotamount="default"
                            data-saveperformance="off"
                            data-masterspeed="1000"
                            data-delay="8000"
                            data-title="The Art of Design">

                        <!-- MAIN IMAGE -->
                        <img src="img/revolution/mp_slide_1.jpg"
                             alt=""
                             data-bgrepeat="no-repeat"
                             data-bgfit="cover"
                             class="rev-slidebg"
                        >

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption hero-text giant_nocaps"
                             data-x="center"
                             data-y="center"
                             data-transform_idle="o:1;s:1500;"
                             data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.1;sY:0.1;skX:0;skY:0;opacity:0;s:1000;e:Power3.easeOut;"
                             data-transform_out="opacity:0;sX:0;sY:0;s:1200;e:Power3.easeInOut;"
                             data-start="1000"
                             data-splitout="none">Modern Design
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption subheading_text"
                             data-x="center"
                             data-y="center"
                             data-voffset="84"
                             data-transform_idle="o:1;s:1500;"
                             data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0;sY:0;skX:0;skY:0;opacity:0;s:1000;e:Power3.easeOut;"
                             data-transform_out="opacity:0;sX:0;sY:0;s:1200;e:Power3.easeInOut;"
                             data-start="1000">Super Clean With a Great Attention to Details
                        </div>

                    </li> <!-- end slide 1 -->

                    <!-- SLIDE 2 -->
                    <li data-transition="cube"
                        data-slotamount="1"
                        data-masterspeed="1000"
                        data-delay="8000"
                        data-title="Creative &amp; Emotional">
                        <!-- MAIN IMAGE -->
                        <img src="img/revolution/mp_slide_2.jpg"
                             alt=""
                             data-bgrepeat="no-repeat"
                             data-bgfit="cover"
                             class="rev-slidebg"
                        >

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption hero-text large_white"
                             data-x="center"
                             data-y="center"
                             data-voffset="-50"
                             data-transform_idle="o:1;s:1500;"
                             data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0;sY:0;skX:0;skY:0;opacity:0;s:1000;e:Power3.easeOut;"
                             data-transform_out="opacity:0;sX:0;sY:0;s:1200;e:Power3.easeInOut;"
                             data-start="1000">Super Flexible Theme
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption hero-text large_white"
                             data-x="center"
                             data-y="center"
                             data-voffset="15"
                             data-transform_idle="o:1;s:1500;"
                             data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0;sY:0;skX:0;skY:0;opacity:0;s:1000;e:Power3.easeOut;"
                             data-transform_out="opacity:0;sX:0;sY:0;s:1200;e:Power3.easeInOut;"
                             data-start="1000">Suits for any Business
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption tp-resizeme"
                             data-x="center"
                             data-y="center"
                             data-hoffset="0"
                             data-voffset="105"
                             data-transform_idle="o:1;s:1500;"
                             data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0;sY:0;skX:0;skY:0;opacity:0;s:1000;e:Power3.easeOut;"
                             data-transform_out="opacity:0;sX:0;sY:0;s:1200;e:Power3.easeInOut;"
                             data-start="1000"
                             style="z-index: 12; max-width: auto; max-height: auto; white-space: nowrap;"><a href='#' class='btn btn-lg btn-transparent'>Learn More</a>
                        </div>

                    </li> <!-- end slide 2 -->

                    <!-- SLIDE 3 -->
                    <li data-transition="cube"
                        data-slotamount="1"
                        data-masterspeed="1000"
                        data-delay="8000"
                        data-title="Amazing Agency">
                        <!-- MAIN IMAGE -->
                        <img src="img/revolution/mp_slide_3.jpg"
                             alt=""
                             data-bgrepeat="no-repeat"
                             data-bgfit="cover"
                             class="rev-slidebg"
                        >

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption hero-text medium"
                             data-x="30"
                             data-y="center"
                             data-voffset="-90"
                             data-transform_idle="o:1;s:1000"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:1000;"
                             data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;"
                             data-start="1000">Outstanding Quality
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption small_text"
                             data-x="30"
                             data-y="center"
                             data-voffset="-30"
                             data-transform_idle="o:1;s:900"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:1000;"
                             data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;"
                             data-start="1100">Super Clean and Minimal Design
                        </div>

                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption small_text"
                             data-x="30"
                             data-y="center"
                             data-voffset="0"
                             data-transform_idle="o:1;s:800"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:1000;"
                             data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;"
                             data-start="1200">Awesome Features with Endless Possibilities
                        </div>

                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption small_text"
                             data-x="30"
                             data-y="center"
                             data-voffset="30"
                             data-transform_idle="o:1;s:700"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:1000;"
                             data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;"
                             data-start="1300">Fully Responsive and Retina Ready
                        </div>

                        <!-- LAYER NR. 7 -->
                        <div class="tp-caption tp-resizeme"
                             data-x="30"
                             data-y="center"
                             data-voffset="100"
                             data-hoffset="0"
                             data-transform_idle="o:1;s:600"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:1000;"
                             data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;"
                             data-start="1400"
                             style="z-index: 12; max-width: auto; max-height: auto; white-space: nowrap;"><a href='#' class='btn btn-lg btn-white'>Buy it Now</a>
                        </div>

                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption tp-resizeme"
                             data-x="204"
                             data-y="center"
                             data-voffset="100"
                             data-hoffset="0"
                             data-transform_idle="o:1;s:600"
                             data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:1000;"
                             data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;"
                             data-start="1400"
                             style="z-index: 13; max-width: auto; max-height: auto; white-space: nowrap;"><a href='#' class='btn btn-lg btn-transparent'>Learn More</a>
                        </div>

                    </li> <!-- end slide 3 -->

                </ul>

            </div>
        </div>
    </section>


    <!-- Our Services -->
    <section class="section-wrap-mp services style-2 pb-40 pb-mdm-50">
        <div class="container">

            <div class="row">
                <div class="col-md-4 service-item">
                    <a href="#">
                        <i class="icon icon-DesktopMonitor"></i>
                    </a>
                    <div class="service-item-box">
                        <h3>Great Design</h3>
                        <p>Our web design team will spend time with our digital marketing team to ensure the core principles of effective websites.</p>
                    </div>
                </div> <!-- end service item -->

                <div class="col-md-4 service-item">
                    <a href="#">
                        <i class="icon icon-Layers"></i>
                    </a>
                    <div class="service-item-box">
                        <h3>Perfect Coding</h3>
                        <p>Our web design team will spend time with our digital marketing team to ensure the core principles of effective websites.</p>
                    </div>
                </div> <!-- end service item -->

                <div class="col-md-4 service-item">
                    <a href="#">
                        <i class="icon icon-Eye"></i>
                    </a>
                    <div class="service-item-box">
                        <h3>Retina Ready</h3>
                        <p>Our web design team will spend time with our digital marketing team to ensure the core principles of effective websites.</p>
                    </div>
                </div> <!-- end service item -->

                <div class="col-md-4 service-item">
                    <a href="#">
                        <i class="icon icon-User"></i>
                    </a>
                    <div class="service-item-box">
                        <h3>5 Star Support</h3>
                        <p>Our web design team will spend time with our digital marketing team to ensure the core principles of effective websites.</p>
                    </div>
                </div> <!-- end service item -->

                <div class="col-md-4 service-item">
                    <a href="#">
                        <i class="icon icon-Settings"></i>
                    </a>
                    <div class="service-item-box">
                        <h3>Easy to Customize</h3>
                        <p>Our web design team will spend time with our digital marketing team to ensure the core principles of effective websites.</p>
                    </div>
                </div> <!-- end service item -->

                <div class="col-md-4 service-item">
                    <a href="#">
                        <i class="icon icon-Timer"></i>
                    </a>
                    <div class="service-item-box">
                        <h3>Fast Loading</h3>
                        <p>Our web design team will spend time with our digital marketing team to ensure the core principles of effective websites.</p>
                    </div>
                </div> <!-- end service item -->

            </div>
        </div>
    </section> <!-- end services -->


    <!-- Promo Section -->
    <section class="section-wrap-mp promo-section bg-dark">

        <div id="owl-promo" class="owl-carousel owl-theme">

            <div class="item">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                            <?= Html::img(Url::to('@web/themes/enterprise/img/promo_img_1.png'), ['alt' => '']); ?>
                        </div>

                        <div class="col-md-6 promo-description">
                            <p class="subheading">Chase Your Dream</p>
                            <h3 class="color-white">Best Html Template Ever</h3>
                            <p class="mb-30"> We want to tell your brand’s story with quality content that will help you inspire your audience, build meaningful connections and
                                grow your success. Different marketing goals mean different content tools.</p>
                            <a href="#" class="btn btn-lg btn-color">Purchase Now</a>
                            <div class="customNavigation mt-40">
                                <a class="prev"><i class="icon arrow_left"></i></a>
                                <a class="next"><i class="icon arrow_right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="item">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.1s">
                            <?= Html::img(Url::to('@web/themes/enterprise/img/promo_img_2.png'), ['alt' => '']); ?>
                        </div>

                        <div class="col-md-6 promo-description">
                            <p class="subheading">Chase Your Dream</p>
                            <h3 class="color-white">Touch Owl Carousel Slider</h3>
                            <p class="mb-30"> We want to tell your brand’s story with quality content that will help you inspire your audience, build meaningful connections and
                                grow your success. Different marketing goals mean different content tools.</p>
                            <a href="#" class="btn btn-lg btn-color">Purchase Now</a>
                            <div class="customNavigation mt-40">
                                <a class="prev"><i class="icon arrow_left"></i></a>
                                <a class="next"><i class="icon arrow_right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="item">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.1s">
                            <?= Html::img(Url::to('@web/themes/enterprise/img/promo_img_3.png'), ['alt' => '']); ?>
                        </div>

                        <div class="col-md-6 promo-description">
                            <p class="subheading">Chase Your Dream</p>
                            <h3 class="color-white">Self Hosted Video Background</h3>
                            <p class="mb-30"> We want to tell your brand’s story with quality content that will help you inspire your audience, build meaningful connections and
                                grow your success. Different marketing goals mean different content tools.</p>
                            <a href="#" class="btn btn-lg btn-color">Purchase Now</a>
                            <div class="customNavigation mt-40">
                                <a class="prev"><i class="icon arrow_left"></i></a>
                                <a class="next"><i class="icon arrow_right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div> <!-- end slider -->
    </section> <!-- end promo section -->


    <!-- Portfolio -->
    <section class="section-wrap-mp pb-60">
        <div class="container">

            <div class="row heading">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <h2 class="text-center bottom-line">Latest Works</h2>
                    <p class="subheading text-center">We Take Care About Every Detail</p>
                </div>
            </div>

            <!-- filter -->
            <div class="row">
                <div class="col-md-12">
                    <div class="portfolio-filter">
                        <a href="#" class="filter active" data-filter="*">All</a>
                        <a href="#" class="filter" data-filter=".web-design">Web Design</a>
                        <a href="#" class="filter" data-filter=".print">Print</a>
                        <a href="#" class="filter" data-filter=".branding">Branding</a>
                        <a href="#" class="filter" data-filter=".mockups">Mockups</a>
                    </div>
                </div>
            </div> <!-- end filter -->

            <div class="row">

                <div class="works-grid titles">

                    <div class="col-md-4 col-xs-6 work-item web-design mockups">
                        <div class="work-container">
                            <div class="work-img">

                                <?= Html::img(Url::to('@web/themes/enterprise/img/project_1.png'), ['alt' => '']); ?>

                                <div class="portfolio-overlay">
                                    <div class="project-icons">
                                        <a href="img/project_1_big.jpg" class="lightbox-gallery" title="Poster Mockup"><i class="fa fa-search"></i></a>
                                        <a href="portfolio-single.html" class="project-icon"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="work-description">
                                <h3><a href="#">Poster Mockup</a></h3>
                                <span><a href="#">Print</a></span>
                            </div>
                        </div>
                    </div> <!-- end work-item -->

                    <div class="col-md-4 col-xs-6 work-item branding print">
                        <div class="work-container">
                            <div class="work-img">

                                <?= Html::img(Url::to('@web/themes/enterprise/img/project_2.png'), ['alt' => '']); ?>

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

                    <div class="col-md-4 col-xs-6 work-item branding">
                        <div class="work-container">
                            <div class="work-img">

                                <?= Html::img(Url::to('@web/themes/enterprise/img/project_3.png'), ['alt' => '']); ?>

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

                    <div class="col-md-4 col-xs-6 work-item print mockups">
                        <div class="work-container">
                            <div class="work-img">
                                <img src="img/project_4.jpg" alt="">
                                <div class="portfolio-overlay">
                                    <div class="project-icons">
                                        <a href="img/project_4_big.jpg" class="lightbox-gallery" title="Brod Identity"><i class="fa fa-search"></i></a>
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

                    <div class="col-md-4 col-xs-6 work-item mockups branding">
                        <div class="work-container">
                            <div class="work-img">
                                <img src="img/project_5.jpg" alt="">
                                <div class="portfolio-overlay">
                                    <div class="project-icons">
                                        <a href="img/project_5_big.jpg" class="lightbox-gallery" title="Cup Mockup"><i class="fa fa-search"></i></a>
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

                    <div class="col-md-4 col-xs-6 work-item web-design branding">
                        <div class="work-container">
                            <div class="work-img">
                                <img src="img/project_6.jpg" alt="">
                                <div class="portfolio-overlay">
                                    <div class="project-icons">
                                        <a href="img/project_6_big.jpg" class="lightbox-gallery" title="Stationery Mockup"><i class="fa fa-search"></i></a>
                                        <a href="portfolio-single.html" class="project-icon"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="work-description">
                                <h3><a href="#">Stationery Mockup</a></h3>
                                <span><a href="#">Mockup</a></span>
                            </div>
                        </div>
                    </div> <!-- end work-item -->

                </div>

            </div>
        </div>
    </section> <!-- end portfolio-->


    <!-- Call to Action Style-2 -->
    <section class="section-wrap call-to-action style-2" style="background-image: url(<?= Url::to('@web/themes/enterprise/img/cta_bg.png') ?>)">
        <div class="container text-center">
            <div class="row">

                <div class="col-xs-12">
                    <h2>Are You Ready to Start With This Awesome Theme?</h2>
                    <a href="#" class="btn btn-lg btn-transparent">Learn More</a>
                    <a href="#" class="btn btn-lg btn-white">Buy it Now</a>
                </div>

            </div>
        </div>
    </section> <!-- end call to action -->


    <!-- Features -->
    <section class="section-wrap-mp features pt-140">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="promo-device text-center">
                        <?= Html::img(Url::to('@web/themes/enterprise/img/ipad_promo.png'), ['alt' => '']); ?>
                    </div>
                </div> <!-- end col -->

                <div class="col-md-6">
                    <div class="features-icons mt-80">

                        <div class="service-item-box icon-effect-1 icon-effect-1a">
                            <a href="#">
                                <i class="icon icon-Planet hi-icon"></i>
                            </a>
                            <div class="features-text">
                                <h6>Endless Possibilities</h6>
                                <p>Our web design team will spend time with our digital marketing team to ensure the core principles of effective websites.</p>
                            </div>
                        </div>

                        <div class="service-item-box icon-effect-1 icon-effect-1a">
                            <a href="#">
                                <i class="icon icon-ChartUp hi-icon"></i>
                            </a>
                            <div class="features-text">
                                <h6>SEO Optimized</h6>
                                <p>And finally the subconscious is the mechanism through which thought impulses which are repeated regularly.</p>
                            </div>
                        </div>

                        <div class="service-item-box icon-effect-1 icon-effect-1a">
                            <a href="#">
                                <i class="icon icon-Users hi-icon"></i>
                            </a>
                            <div class="features-text">
                                <h6>Built with best UX</h6>
                                <p>In order to understand how the conscious and subconscious minds work together as a team to create your reality.</p>
                            </div>
                        </div>

                        <div class="service-item-box icon-effect-1 icon-effect-1a last">
                            <a href="#">
                                <i class="icon icon-Layers hi-icon"></i>
                            </a>
                            <div class="features-text">
                                <h6>Drag n Drop Page Builder</h6>
                                <p>Our web design team will spend time with our digital marketing team to ensure the core principles of effective websites.</p>
                            </div>
                        </div>

                    </div>
                </div> <!-- end col -->

            </div>
        </div>
    </section> <!-- end features -->

    <!-- Results -->
    <section class="result-boxes section-wrap style-2" style="background-image: url(<?= Url::to('@web/themes/enterprise/img/results_bg.png') ?>)">
        <div class="container">
            <div class="row">

                <div class="col-sm-3">
                    <div class="statistic result-box">
                        <div class="result-wrap clearfix">
                            <span class="timer" data-from="0" data-to="1200"></span>
                            <span class="counter-text">Projects Done</span>
                        </div>
                    </div>
                </div> <!-- end first result box -->

                <div class="col-sm-3">
                    <div class="statistic result-box">
                        <div class="result-wrap clearfix">
                            <span class="timer" data-from="0" data-to="578"></span>
                            <span class="counter-text">Awards Won</span>
                        </div>
                    </div>
                </div> <!-- end second result box -->

                <div class="col-sm-3">
                    <div class="statistic result-box">
                        <div class="result-wrap clearfix">
                            <span class="timer" data-from="0" data-to="2489"></span>
                            <span class="counter-text">Happy Clients</span>
                        </div>
                    </div>
                </div> <!-- end third result box -->

                <div class="col-sm-3">
                    <div class="statistic result-box">
                        <div class="result-wrap clearfix">
                            <span class="timer" data-from="0" data-to="1329"></span>
                            <span class="counter-text">Lines of Code</span>
                        </div>
                    </div>
                </div> <!-- end fourth result box -->

            </div>
        </div>
    </section> <!-- end results-->

    <!-- Pricing 3 Columns -->
    <section class="section-wrap-mp pricing">
        <div class="container">

            <div class="row heading">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <h2 class="text-center bottom-line">Our Prices</h2>
                    <p class="subheading text-center">We Deliver Happiness</p>
                </div>
            </div>

            <div class="row">

                <div class="col-md-4">
                    <div class="pricing-3-col wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                        <div class="pricing-title">
                            <h3>Basic</h3>
                            <div class="pricing-price">
                                <span class="pricing-currency">$99</span>
                                <span class="pricing-term">Per Month</span>
                            </div>
                        </div>

                        <div class="pricing-features">
                            <ul>
                                <li>Fully Responsive</li>
                                <li>Clean Design</li>
                                <li>Tons of Features</li>
                                <li>Awesome Shortcodes</li>
                                <li>Easy to Customize</li>
                            </ul>
                        </div>

                        <div class="pricing-button">
                            <a href="#">
                                <div class="btn btn-lg btn-color">Purchase Now</div>
                            </a>
                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-md-4">
                    <div class="pricing-3-col wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="pricing-title best-price">
                            <h3>Advanced</h3>
                            <div class="pricing-price">
                                <span class="pricing-currency">$119</span>
                                <span class="pricing-term">Per Month</span>
                            </div>
                        </div>

                        <div class="pricing-features">
                            <ul>
                                <li>Fully Responsive</li>
                                <li>Clean Design</li>
                                <li>Tons of Features</li>
                                <li>Awesome Shortcodes</li>
                                <li>Easy to Customize</li>
                            </ul>
                        </div>

                        <div class="pricing-button">
                            <a href="#">
                                <div class="btn btn-lg btn-color">Purchase Now</div>
                            </a>
                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-md-4">
                    <div class="pricing-3-col last wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="pricing-title">
                            <h3>Premium</h3>
                            <div class="pricing-price">
                                <span class="pricing-currency">$139</span>
                                <span class="pricing-term">Per Month</span>
                            </div>
                        </div>

                        <div class="pricing-features">
                            <ul>
                                <li>Fully Responsive</li>
                                <li>Clean Design</li>
                                <li>Tons of Features</li>
                                <li>Awesome Shortcodes</li>
                                <li>Easy to Customize</li>
                            </ul>
                        </div>

                        <div class="pricing-button">
                            <a href="#">
                                <div class="btn btn-lg btn-color">Purchase Now</div>
                            </a>
                        </div>
                    </div>
                </div> <!-- end col -->

            </div>
        </div>
    </section> <!-- end pricing 3 columns-->

    <!-- Testimonials -->
    <section class="section-wrap-mp testimonials style-2 bg-light">

        <div class="row heading mb-20">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <h2 class="text-center">Happy Clients</h2>
            </div>
        </div>

        <div id="owl-testimonials" class="owl-carousel owl-theme text-center">

            <div class="item">
                <div class="container testimonial">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <p class="testimonial-text">I’am amazed, I should say thank you so much for your awesome template. Design is so good and neat, every detail has been
                                taken care these team are realy amazing and talented! I will work only with enigma agency. I will rate it 5 Stars!</p>
                            <span>John C. Marshall, Art Director</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="container testimonial">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <p class="testimonial-text">I’am amazed, I should say thank you so much for your awesome template. Design is so good and neat, every detail has been
                                taken care these team are realy amazing and talented! I will work only with enigma agency. I will rate it 5 Stars!</p>
                            <span>Jessica Green, CEO of Company</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="container testimonial">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <p class="testimonial-text">I’am amazed, I should say thank you so much for your awesome template. Design is so good and neat, every detail has been
                                taken care these team are realy amazing and talented! I will work only with enigma agency. I will rate it 5 Stars!</p>
                            <span>Chandler Bing, Google</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section> <!-- end testimonials -->

    <!-- Call to Action -->
    <section class="call-to-action">
        <div class="container">
            <div class="row">

                <div class="col-md-9 col-xs-12">
                    <h2>Have you Fallen In Love Already? Grab this perfect theme.</h2>
                </div>

                <div class="col-md-3 col-xs-12 cta-button">
                    <a href="#" class="btn btn-lg btn-color">Buy it Now</a>
                </div>

            </div>
        </div>
    </section> <!-- end call to action -->
