<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PurchaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '采购中心';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/themes/qijian/css/product.css');
?>

<?= $this->render('../slide', ['pagekey' => 'purchase']); ?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<div class="container content">

    <!-- 当前位置 -->
    <?= $this->render('../nav'); ?>
    <!-- #当前位置 -->

    <!-- 相关分类 -->
    <?= $this->render('../cls', ['result' => $result, 'type' => 'purchase']); ?>
    <!-- #相关分类 -->

    <hr/>

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
