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
$this->params['breadcrumbs'][] = $this->title;

?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<?= $this->render('../slide', ['pagekey' => 'user']); ?>

<?= $this->render('../nav'); ?>

<section class="section-wrap blog-standard" style="padding: 60px 0">
    <div class="container relative">
        <div class="row">
            <div class="col-sm-3 sidebar blog-sidebar">
                <?= $this->render('../user/_left'); ?>
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
