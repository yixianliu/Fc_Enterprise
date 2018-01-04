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

<?= $this->render('../slide', ['pagekey' => 'index']); ?>

<section class="section-wrap-mp services style-2 pb-40 pb-mdm-50">
    <div class="container">

        <div class="row">
            <div class="col-md-4 service-item">
                <a href="#">
                    <i class="icon icon-DesktopMonitor"></i>
                </a>
                <div class="service-item-box">
                    <h3>容易上手</h3>
                    <p>Our web design team will spend time with our digital marketing team to ensure the core principles of effective websites.</p>
                </div>
            </div> <!-- end service item -->

            <div class="col-md-4 service-item">
                <a href="#">
                    <i class="icon icon-Layers"></i>
                </a>
                <div class="service-item-box">
                    <h3>代码清晰</h3>
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
                    <h3>简单易用</h3>
                    <p>Our web design team will spend time with our digital marketing team to ensure the core principles of effective websites.</p>
                </div>
            </div> <!-- end service item -->

            <div class="col-md-4 service-item">
                <a href="#">
                    <i class="icon icon-Timer"></i>
                </a>
                <div class="service-item-box">
                    <h3>YII2 框架为底层</h3>
                    <p>Yii 自带了 丰富的功能，包括 MVC，DAO/ActiveRecord，I18N/L10N，缓存，身份验证和基于角色的访问控制，脚手架，测试等，可显著缩短开发时间。</p>
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
                        <p class="">创建单网页</p>
                        <h3 class="color-white">单网页内部可以自己进行 DIY</h3>

                        <p class="mb-30"> We want to tell your brand’s story with quality content that will help you inspire your audience, build meaningful connections and
                            grow your success. Different marketing goals mean different content tools.</p>

                        <a href="#" class="btn btn-lg btn-color">尝试了解...</a>
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
                <h2 class="text-center bottom-line">产品中心</h2>
                <p class="text-center">用户只需简单设置，即可一键生成代码包，轻松发布小程序。</p>
            </div>
        </div>

        <!-- filter -->
        <div class="row">
            <div class="col-md-12">
                <div class="portfolio-filter">

                    <a href="#" class="filter active" data-filter="*">所有分类</a>

                    <?php foreach ($result['product-cls'] as $value): ?>
                        <a href="#" class="filter" data-filter=".web-design"><?= $value['name'] ?></a>
                    <?php endforeach; ?>

                </div>
            </div>
        </div> <!-- end filter -->

        <div class="row">

            <div class="works-grid titles">

                <div class="col-md-4 col-xs-6 work-item web-design mockups">
                    <div class="work-container">
                        <div class="work-img">

                            <img src="<?= Url::to('@web/themes/enterprise/img') ?>/project_1.jpg" alt="">

                            <div class="portfolio-overlay">
                                <div class="project-icons">
                                    <a href="<?= Url::to('@web/themes/enterprise/img') ?>/project_1_big.jpg" class="lightbox-gallery" title="Poster Mockup">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <a href="portfolio-single.html" class="project-icon"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="work-description">
                            <h3><a href="#">Poster Mockup</a></h3>
                            <span><a href="#">Print</a></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xs-6 work-item branding print">
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

                <div class="col-md-4 col-xs-6 work-item branding">
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

                <div class="col-md-4 col-xs-6 work-item print mockups">
                    <div class="work-container">
                        <div class="work-img">
                            <img src="<?= Url::to('@web/themes/enterprise/img') ?>/project_4.jpg" alt="">
                            <div class="portfolio-overlay">
                                <div class="project-icons">
                                    <a href="<?= Url::to('@web/themes/enterprise/img') ?>/project_4_big.jpg" class="lightbox-gallery" title="Brod Identity">
                                        <i class="fa fa-search"></i>
                                    </a>
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

                <div class="col-md-4 col-xs-6 work-item web-design branding">
                    <div class="work-container">
                        <div class="work-img">
                            <img src="<?= Url::to('@web/themes/enterprise/img') ?>/project_6.jpg" alt="">
                            <div class="portfolio-overlay">
                                <div class="project-icons">
                                    <a href="<?= Url::to('@web/themes/enterprise/img') ?>/project_6_big.jpg" class="lightbox-gallery" title="Stationery Mockup"><i
                                                class="fa fa-search"></i></a>
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
<section class="section-wrap call-to-action style-2" style='background-image: url("<?= Url::to('@web/themes/enterprise/img') ?>/cta_bg.jpg")'>
    <div class="container text-center">
        <div class="row">

            <div class="col-xs-12">
                <h2>你准备好开始这个令人敬畏的主题了吗？</h2>
                <a href="#" class="btn btn-lg btn-transparent">了解更多...</a>
                <a href="#" class="btn btn-lg btn-white">购买我们产品</a>
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
            </div>

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

<!-- Pricin 3 Columns -->
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
                        <h3>高级版本</h3>
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
