<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BidSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '招标管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_search', ['model' => $searchModel]); ?>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?></h2></header>
        <div class="content-body">
            <div class="row">

                <p>
                    <?= Html::a('添加投标', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel'  => $searchModel,
                    'columns'      => [
                        [
                            'class'   => 'yii\grid\SerialColumn',
                            'options' => ['width' => 100]
                        ],
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
        </div>
    </section>
</div>

