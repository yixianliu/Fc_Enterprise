<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PurchaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '采购中心';
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

                <?= $this->render('_search', ['model' => $searchModel]); ?>

                <hr/>

                <p>
                    <?= Html::a('发布采购信息', ['create']) ?> /
                    <?= Html::a('发布采购信息分类', ['/admin/psb-cls/index', 'id' => 'P0']) ?> /
                </p>

                <hr/>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'title',
                        'price',
                        [
                            'attribute' => 'is_type',
                            'value'     => function ($model) {
                                $state = [
                                    'Long'  => '长期采购',
                                    'Short' => '短期采购',
                                ];

                                return $state[ $model->is_type ];
                            },
                        ],
                        [
                            'attribute' => 'is_status',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '采购中',
                                    'Off' => '暂停采购',
                                ];

                                return $state[ $model->is_status ];
                            },
                        ],
                        [
                            'attribute' => 'is_using',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '已启用',
                                    'Off' => '未启用',
                                ];

                                return $state[ $model->is_using ];
                            },
                        ],
                        [
                            'attribute' => 'is_send_msg',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '已启用',
                                    'Off' => '未启用',
                                ];

                                return $state[ $model->is_using ];
                            },
                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>

            </div>
        </div>
    </section>
</div>

