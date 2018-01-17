<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Job */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '招聘中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<?= $this->render('../slide', ['pagekey' => 'job']); ?>

<?= $this->render('../nav'); ?>

<section class="blog-single">
    <div class="container relative">
        <div class="row">

            <!-- content -->
            <div class="blog-content">

                <!-- standard post -->
                <div class="entry-item">


                    <div class="entry-title">
                        <h1><?= Html::encode($this->title) ?></h1>
                    </div>

                    <ul class="entry-meta bottom-line">
                        <li class="entry-date">
                            <a href="#"> <?= date('m月 d, Y', $model->updated_at) ?></a>
                        </li>
                        <li class="entry-author">
                            作者 : <a href="#"><?= $model->user_id ?></a>
                        </li>
                        <li class="entry-category">
                            关键词 : <a href="#"><?= $model->keywords ?></a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['commont/index', ['id' => $model->job_id, 'type' => 'news']]) ?>" class="entry-comments">10 条评论</a>
                        </li>
                    </ul>

                    <div class="entry">
                        <div class="entry-content">

                            <?= $model->content ?>

                            <hr/>

                            <div class="row mt-30">

                                <div class="col-md-8">
                                    <div class="entry-tags">
                                        <h6>Tags:</h6>
                                        <a href="#">Design</a>,
                                        <a href="#">Photography</a>,
                                        <a href="#">Branding</a>,
                                        <a href="#">Creative</a>
                                    </div>
                                </div>

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

                            </div>

                            <br/>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
