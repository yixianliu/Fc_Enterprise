<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '新闻中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="page-title style-2">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1><h1><?= Html::encode($this->title) ?></h1></h1>

                <?=
                \yii\widgets\Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]);
                ?>

            </div>
        </div>
    </div>
</section>

<section class="section-wrap pb-100 blog-single">
    <div class="container relative">
        <div class="row">

            <!-- content -->
            <div class="col-sm-12 blog-content">

                <!-- standard post -->
                <div class="entry-item">

                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">

                            <div class="entry-title">
                                <h2><?= Html::encode($this->title) ?></h2>
                            </div>

                            <ul class="entry-meta bottom-line">
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

                                    <?= DetailView::widget([
                                        'model' => $model,
                                        'attributes' => [
                                            'id',
                                            'news_id',
                                            'user_id',
                                            'c_key',
                                            'sort_id',
                                            'title',
                                            'content:ntext',
                                            'introduction',
                                            'path',
                                            'images',
                                            'keywords',
                                            'praise',
                                            'forward',
                                            'collection',
                                            'share',
                                            'attention',
                                            'is_promote',
                                            'is_hot',
                                            'is_winnow',
                                            'is_recommend',
                                            'is_audit',
                                            'is_comments',
                                            'is_img',
                                            'is_thumb',
                                            'created_at',
                                            'updated_at',
                                        ],
                                    ]) ?>

                                    <div class="row mt-30">
                                        <div class="col-md-8">
                                            <div class="entry-tags">
                                                <h6>Tags:</h6>
                                                <a href="#">Design</a>,
                                                <a href="#">Photography</a>,
                                                <a href="#">Branding</a>,
                                                <a href="#">Creative</a>
                                            </div>
                                        </div> <!-- end tags -->

                                        <div class="col-md-4 clearfix">
                                            <div class="entry-share">
                                                <h6>Share:</h6>
                                                <div class="socials">
                                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                                    <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end share -->

                                </div>
                            </div> <!-- end entry -->

                        </div>
                    </div> <!-- end row -->

                </div> <!-- end entry item -->
            </div> <!-- end col -->

        </div> <!-- end row -->

    </div> <!-- end container -->
</section> <!-- end blog single -->