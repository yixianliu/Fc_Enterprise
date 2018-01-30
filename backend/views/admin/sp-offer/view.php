<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SpOffer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '价格中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sp-offer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '是否删除这条记录?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'offer_id',
            'user_id',
            'price',
            [
                'attribute' => 'is_type',
                'value'     => function ($model) {
                    $state = [
                        'Supply'   => '供应',
                        'Purchase' => '采购',
                        'Bid'      => '投标'
                    ];

                    return $state[ $model->is_type ];
                },
            ],
            [
                'attribute' => 'is_using',
                'value'     => function ($model) {
                    $state = [
                        'On'  => '开启',
                        'Off' => '未启用',
                    ];

                    return $state[ $model->is_using ];
                },
            ],
            [
                'attribute' => 'created_at',
                'value'     => function ($model) {
                    return date('Y - m -d , H:i:s', $model->created_at);
                },
            ],
            [
                'attribute' => 'updated_at',
                'value'     => function ($model) {
                    return date('Y - m -d , H:i:s', $model->updated_at);
                },
            ],
        ],
    ]) ?>

</div>
