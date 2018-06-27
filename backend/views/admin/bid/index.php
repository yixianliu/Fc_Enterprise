<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BidSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '招标管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bid-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bid', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],
            'c_key',
            'bid_id',
            'user_id',
            'title',
            [
                'attribute' => 'is_using',
                'value'     => function ($model) {
                    $state = [
                        'On'  => '已启用',
                        'Off' => '未启用',
                    ];

                    return $state[ $model->is_using ];
                },
                'options'   => ['width' => 100]
            ],
            [
                'attribute' => 'created_at',
                'value'     => function ($model) {
                    return date('Y - m -d , h:i', $model->created_at);
                },
                'options'   => ['width' => 180]
            ],
            [
                'attribute' => 'updated_at',
                'value'     => function ($model) {
                    return date('Y - m -d , h:i', $model->updated_at);
                },
                'options'   => ['width' => 180]
            ],
            [
                'class'   => 'yii\grid\ActionColumn',
                'options' => ['width' => 100]
            ],
        ],
    ]); ?>
</div>
