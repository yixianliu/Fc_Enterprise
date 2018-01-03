<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '新闻中心';
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

<section class="section-wrap-mp pb-50">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="portfolio-filter">
                    <a href="#" class="filter active">所有分类</a>
                    <a href="#" class="filter">Web Design</a>
                    <a href="#" class="filter">Print</a>
                    <a href="#" class="filter">Branding</a>
                    <a href="#" class="filter">Mockups</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="works-grid titles">

                <?=
                ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_list',
                ]);
                ?>

            </div>
        </div>
    </div>
</section>
