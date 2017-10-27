<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'product_id',
            'user_id',
            'l_key',
            'c_key',
            's_key',
            'title',
            'content:ntext',
            'price',
            'discount',
            'introduction',
            'keywords',
            'path',
            'praise',
            'forward',
            'collection',
            'share',
            'attention',
            'is_promote',
            'is_hot',
            'is_classic',
            'is_winnow',
            'is_recommend',
            'is_audit',
            'is_field',
            'is_comments',
            'is_img',
            'is_thumb',
            'grade',
            'user_grade',
            'published',
        ],
    ]) ?>

</div>
