<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品列表';
$this->params['breadcrumbs'][] = $this->title;

?>

<?= Html::cssFile('@web/themes/qijian/css/product.css') ?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<?= $this->render('../slide', ['pagekey' => 'product']); ?>

<div class="container content">

    <!-- 当前位置 -->
    <?= $this->render('../nav'); ?>
    <!-- #当前位置 -->

    <!-- 相关分类 -->
    <?= $this->render('../cls', ['result' => $result, 'type' => 'product']); ?>
    <!-- #相关分类 -->

    <!-- 可变化内容 -->
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
<!-- #内容中心 -->