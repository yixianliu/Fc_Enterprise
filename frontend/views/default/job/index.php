<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JobSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '招聘中心';
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<?= $this->render('../slide', ['pagekey' => 'job']); ?>

<?= $this->render('../nav'); ?>

<section class="section-wrap-mp pb-50">
    <div class="container">

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
