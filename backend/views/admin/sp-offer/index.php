<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '价格中心';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">
                <?= Html::encode($this->title) ?>
            </h2>
        </header>
        <div class="content-body">
            <div class="row">

                <p>
                    <?= Html::a('采购价格', ['index', 'type' => 'Supply']) ?> /
                    <?= Html::a('供应价格', ['index', 'type' => 'Purchase']) ?>
                </p>

                <br/>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],
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

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>

            </div>
        </div>
    </section>
</div>
