<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductClassifySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Classifies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-classify-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product Classify', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'c_key',
            'sort_id',
            'r_key',
            'name',
            // 'description:ntext',
            // 'keywords',
            // 'ico_class',
            // 'parent_id',
            // 'is_using',
            // 'published',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
