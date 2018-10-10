<?php

use yii\helpers\Url;
use yii\helpers\Html;
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

<?= $this->render('../_slide'); ?>

<div class="container content">

    <?= Yii::$app->view->renderFile('@app/views/default/_left.php', [ 'MenuArray' => $this->params[ 'MenuArray' ] ]); ?>

    <div class="right">

        <?= $this->render('../_nav'); ?>

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