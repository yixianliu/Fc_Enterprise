<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '新闻中心';
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<?= $this->render('../slide', ['pagekey' => 'news']); ?>

<div class="container content">

    <?= $this->render('../_left', ['type' => 'news']); ?>

    <div class="right">

        <?= $this->render('../nav'); ?>

        <hr/>

        <div class="content_news_list">

            <?=
            ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView'     => '_list',
            ]);
            ?>

        </div>
    </div>

</div>