<?php

use yii\widgets\ListView;

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

<?= Yii::$app->view->renderFile('@app/views/default/_slide.php'); ?>

<div class="container content">

    <?= Yii::$app->view->renderFile('@app/views/default/_nav.php'); ?>

    <!-- 相关分类 -->
    <?= Yii::$app->view->renderFile('@app/views/default/_cls.php', ['result' => $result]); ?>
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