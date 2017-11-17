<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductClassify */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Product Classifies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-classify-view">

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
            'c_key',
            'sort_id',
            'r_key',
            'name',
            'description:ntext',
            'keywords',
            'ico_class',
            'parent_id',
            'is_using',
            'published',
        ],
    ]) ?>

</div>
