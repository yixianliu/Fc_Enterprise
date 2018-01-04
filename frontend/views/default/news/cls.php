<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsClassifySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '新闻列表';
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<?= $this->render('../slide', ['pagekey' => 'news']); ?>

<?= $this->render('../nav'); ?>

<section class="section-wrap-mp pb-50">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="portfolio-filter">

                    <a href="<?= Url::to(['news/index']); ?>" class="filter active">所有分类</a>

                    <?php foreach ($result['classify'] as $value): ?>
                        <a href="<?= Url::to(['news-cls/index', 'id' => $value['c_key']]); ?>" class="filter"><?= $value['name'] ?></a>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="works-grid titles">

                <?=
                ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView'     => '_list',
                ]);
                ?>

            </div>
        </div>
    </div>
</section>
