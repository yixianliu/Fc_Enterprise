<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品列表';
$this->params['breadcrumbs'][] = $this->title;

?>
<style type="text/css">
    .summary {
        display: none;
    }
</style>

<section class="page-title style-2">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">

                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]);
                ?>

            </div>
        </div>
    </div>
</section>

<section class="section-wrap-mp pb-50">
    <div class="container">

        <!-- filter -->
        <div class="row">
            <div class="col-md-12">
                <div class="portfolio-filter">
                    <a href="#" class="filter active" data-filter="*">所有</a>
                    <a href="#" class="filter" data-filter=".web-design">Web Design</a>
                    <a href="#" class="filter" data-filter=".print">Print</a>
                    <a href="#" class="filter" data-filter=".branding">Branding</a>
                    <a href="#" class="filter" data-filter=".mockups">Mockups</a>
                </div>
            </div>
        </div> <!-- end filter -->

        <div class="row">

            <?=
            ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView'     => '_product',
                'viewParams'   => [
                    'fullView' => true,
                    'context'  => 'main-page',
                ],
                'options'      => ['class' => 'works-grid titles'],
            ]);
            ?>

        </div>
    </div>
</section>

<section class="call-to-action bg-light">
    <div class="container">
        <div class="row">

            <div class="col-md-9 col-xs-12">
                <h2>Are you ready to work with us? Let's grow your business.</h2>
            </div>

            <div class="col-md-3 col-xs-12 cta-button">
                <a href="#" class="btn btn-lg btn-color">Contact Us</a>
            </div>

        </div>
    </div>
</section> <!-- end call to action -->

