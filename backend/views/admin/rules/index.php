<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '规则列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12">
    <section class="box ">

        <header class="panel_header">
            <h2 class="title pull-left"><?= Html::encode($this->title) ?></h2>
        </header>

        <div class="content-body">
            <div class="row">

                <p>
                    <?= Html::a('添加规则', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'name',
                        [
                            'attribute' => 'is_using',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '启用',
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

