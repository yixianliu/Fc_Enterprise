<?php
/**
 *
 * 用户中心
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/12/18
 * Time: 18:23
 */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = '用户中心';

?>

<section class="section-wrap blog-standard">
    <div class="container relative">
        <div class="row">
            <div class="col-sm-3 sidebar blog-sidebar">

                <form role="form" class="relative">
                    <input type="search" class="searchbox" placeholder="搜索从这里开始...">
                    <button type="submit" class="search-button"><i class="icon icon_search"></i></button>
                </form>

                <!-- Categories -->
                <div class="widget categories">
                    <h3 class="widget-title">用户中心 / User Center</h3>
                    <ul>
                        <li><a href="#">用户资料</a></li>
                        <li class="active-cat"><a href="#">发布招聘</a></li>
                        <li><a href="#">企业验证</a></li>
                        <li><a href="#">Multipurpose Themes</a></li>
                        <li><a href="#">修改密码</a></li>
                    </ul>
                </div>

                <div class="widget latest-posts">
                    <h3 class="widget-title">Recent Posts</h3>
                    <ul>
                        <li class="clearfix">
                            <a href="blog-single-post.html">
                                <img src="<?= Url::to('@web/themes/enterprise/img') ?>/blog/latest_posts_1.jpg" alt="">
                                This is standard blog post title
                                <div class="entry-meta">
                                    <span class="entry-date">July 3, 2015</span>
                                </div>
                            </a>
                        </li>
                        <li class="clearfix">
                            <a href="blog-single-post.html">
                                <img src="<?= Url::to('@web/themes/enterprise/img') ?>/blog/latest_posts_2.jpg" alt="">
                                Enigma perfect minimal onepage
                                <div class="entry-meta">
                                    <span class="entry-date">July 2, 2015</span>
                                </div>
                            </a>
                        </li>
                        <li class="clearfix">
                            <a href="blog-single-post.html">
                                <img src="<?= Url::to('@web/themes/enterprise/img') ?>/blog/latest_posts_3.jpg" alt="">
                                Building your business with our themes
                                <div class="entry-meta">
                                    <span class="entry-date">July 1, 2015</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- end col -->

            <!-- content -->
            <div class="col-sm-9 blog-content">

                <!-- standard post -->
                <div class="entry-item">
                    <div class="entry-img">
                        <a href="blog-single.html">
                            <img src="<?= Url::to('@web/themes/enterprise/img') ?>/blog/post_img_1.jpg" alt="">
                        </a>
                    </div>

                    <div class="entry-date hidden-sm hidden-xs">
                        <span>20</span>
                        <span>JUL</span>
                    </div>

                    <div class="entry-title">
                        <h2>
                            <a href="blog-single.html">This is Standard blog post title.</a>
                        </h2>
                    </div>
                    <ul class="entry-meta">
                        <li class="entry-date">
                            <a href="#">20 July, 2015</a>
                        </li>
                        <li class="entry-author">
                            by <a href="#">John Doe</a>
                        </li>
                        <li class="entry-category">
                            in <a href="#">Photography</a>
                        </li>
                        <li>
                            <a href="blog-single.html" class="entry-comments">10 Comments</a>
                        </li>
                    </ul>

                    <div class="entry">
                        <div class="entry-content">
                            <p>We continuosly seek between design and technology. For over a decade, we've helped businesses to craft honest, emotional experiences through
                                strategy, brand development, graphic design, web design. Our team hand picked to provide the right balance of skills to work laboris nisi ut
                                aliquip ex ea commodo consequat.</p>
                            <a href="blog-single.html" class="read-more">Read More</a>
                            <i class="icon arrow_right"></i>
                        </div>
                    </div>
                </div> <!-- end entry item -->

                <!-- gallery post -->
                <div class="entry-item">
                    <div class="entry-slider">
                        <div class="flexslider" id="one-img-slide">
                            <ul class="slides">
                                <li>
                                    <a href="#">
                                        <img src="<?= Url::to('@web/themes/enterprise/img') ?>/blog/gallery_post_img_1.jpg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="<?= Url::to('@web/themes/enterprise/img') ?>/blog/gallery_post_img_2.jpg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="<?= Url::to('@web/themes/enterprise/img') ?>/blog/gallery_post_img_3.jpg" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- end slider -->

                    <div class="entry-date hidden-sm hidden-xs">
                        <span>17</span>
                        <span>JUL</span>
                    </div>

                    <div class="entry-title">
                        <h2>
                            <a href="blog-single.html">Gallery blog post. Italian fashion</a>
                        </h2>
                    </div>
                    <ul class="entry-meta">
                        <li class="entry-date">
                            <a href="#">20 July, 2015</a>
                        </li>
                        <li class="entry-author">
                            by <a href="#">John Doe</a>
                        </li>
                        <li class="entry-category">
                            in <a href="#">Photography</a>
                        </li>
                        <li>
                            <a href="blog-single.html" class="entry-comments">10 Comments</a>
                        </li>
                    </ul>

                    <div class="entry">

                        <div class="entry-content">
                            <p>We continuosly seek between design and technology. For over a decade, we've helped businesses to craft honest, emotional experiences through
                                strategy, brand development, graphic design, web design. Our team hand picked to provide the right balance of skills to work laboris nisi ut
                                aliquip ex ea commodo consequat.</p>
                            <a href="blog-single.html" class="read-more">Read More</a>
                            <i class="icon arrow_right"></i>
                        </div>
                    </div>
                </div> <!-- end entry item -->

                <!-- blockquote post -->
                <div class="entry-item">
                    <div class="entry blockquote mt-0">
                        <blockquote class="blockquote-style-1 text-center mb-0">
                            <i class="fa fa-quote-left"></i>
                            <p>
                                <a href="blog-single.html">The optimist proclaims that we live in the best of all possible worlds, and the pessimist fears this is true</a>
                            </p>
                            <span>– James Branch</span>
                        </blockquote>
                    </div>
                </div> <!-- end entry item -->


                <!-- text post -->
                <div class="entry-item">

                    <div class="entry-date hidden-sm hidden-xs">
                        <span>12</span>
                        <span>JUL</span>
                    </div>

                    <div class="entry-title">
                        <h2>
                            <a href="blog-single.html">This is Text only blog post.</a>
                        </h2>
                    </div>
                    <ul class="entry-meta">
                        <li class="entry-date">
                            <a href="#">12 July, 2015</a>
                        </li>
                        <li class="entry-author">
                            by <a href="#">John Doe</a>
                        </li>
                        <li class="entry-category">
                            in <a href="#">Photography</a>
                        </li>
                        <li>
                            <a href="blog-single.html" class="entry-comments">10 Comments</a>
                        </li>
                    </ul>

                    <div class="entry">
                        <div class="entry-content">
                            <p>We continuosly seek between design and technology. For over a decade, we've helped businesses to craft honest, emotional experiences through
                                strategy, brand development, graphic design, web design. Our team hand picked to provide the right balance of skills to work laboris nisi ut
                                aliquip ex ea commodo consequat.</p>
                            <a href="blog-single.html" class="read-more">Read More</a>
                            <i class="icon arrow_right"></i>
                        </div>
                    </div>
                </div> <!-- end entry item -->

                <!-- Pagination -->
                <nav class="pagination clear text-center">
                    <i class="icon arrow_left"></i>
                    <a href="#">Prev</a>
                    <span class="page-numbers current">1</span>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <span class="pagination-dots">...</span>
                    <a href="#">10</a>
                    <a href="#">Next</a>
                    <i class="icon arrow_right"></i>
                </nav>

            </div> <!-- end col -->

            <!-- sidebar -->


        </div> <!-- end row -->
    </div> <!-- end container -->
</section> <!-- end blog standard -->
