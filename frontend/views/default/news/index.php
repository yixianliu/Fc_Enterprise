<?php

use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->params[ 'MenuArray' ][ 'name' ];
$this->params[ 'breadcrumbs' ][] = $this->title;

?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<?= Yii::$app->view->renderFile('@app/views/default/_slide.php'); ?>

<div class="container content">

    <?= Yii::$app->view->renderFile('@app/views/default/_left.php'); ?>

    <div class="right">

        <?= Yii::$app->view->renderFile('@app/views/default/_nav.php'); ?>

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