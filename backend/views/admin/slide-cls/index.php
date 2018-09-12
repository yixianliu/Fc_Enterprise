<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SlideClassifySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '幻灯片分类列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12">

    <?= Html::a('创建单页面幻灯片分类', ['create', 'type' => 'pages'], ['class' => "btn btn-primary"]) ?>

    <?= Html::a('创建幻灯片分类', ['create'], ['class' => "btn btn-primary"]) ?>

    <?= Html::a('创建幻灯片', ['admin/slide/create'], ['class' => "btn btn-primary"]) ?>

    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?></h2></header>

        <div class="content-body">
            <div class="row">

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'c_key',
                        'name',
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
                                return date('Y - m -d , h:i', $model->created_at);
                            },
                        ],
                        [
                            'attribute' => 'updated_at',
                            'value'     => function ($model) {
                                return date('Y - m -d , h:i', $model->updated_at);
                            },
                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                ?>

            </div>
        </div>
    </section>
</div>

