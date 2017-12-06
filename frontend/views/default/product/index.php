<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            'user_id',
            'l_key',
            'c_key',
            // 's_key',
            // 'title',
            // 'content:ntext',
            // 'price',
            // 'discount',
            // 'introduction',
            // 'keywords',
            // 'path',
            // 'praise',
            // 'forward',
            // 'collection',
            // 'share',
            // 'attention',
            // 'is_promote',
            // 'is_hot',
            // 'is_classic',
            // 'is_winnow',
            // 'is_recommend',
            // 'is_audit',
            // 'is_field',
            // 'is_comments',
            // 'is_img',
            // 'is_thumb',
            // 'grade',
            // 'user_grade',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
