<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PurchaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '采购中心';
$this->params['breadcrumbs'][] = $this->title;

?>

<?= Html::cssFile('@web/themes/qijian/css/purzoom.css') ?>

<?= $this->render('../_slide'); ?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<div class="container content">

    <?= $this->render('../_left'); ?>

    <div class="right">

        <?= $this->render('../_nav'); ?>

        <div class="corre-nav">
            <ul class="nav nav-pills">
                <li><a title="" href="">最高价格</a></li>
                <li><a title="" href="">未被采纳</a></li>
                <li><a title="" href="">最低价格</a></li>
            </ul>
        </div>

        <div class="content_product_list">
            <ul>
                <?=
                ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView'     => '_list',
                    'viewParams'   => [
                        'fullView' => true,
                        'context'  => 'main-page',
                    ]
                ]);
                ?>
            </ul>
        </div>

    </div>
</div>