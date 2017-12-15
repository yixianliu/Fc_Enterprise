<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Purchase */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Purchases', 'url' => ['index']];
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

                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('删除', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data'  => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method'  => 'post',
                        ],
                    ]) ?>
                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>
                </p>

                <?= DetailView::widget([
                    'model'      => $model,
                    'attributes' => [
                        'purchase_id',
                        'user_id',
                        'title',
                        'content:ntext',
                        'path',
                        'price',
                        'num',
                        'unit',
                        'type',
                        'is_status',
                        [
                            'attribute' => 'start_at',
                            'value'     => function ($model) {
                                return date('Y - m -d , h:i', $model->start_at);
                            },
                        ],
                        [
                            'attribute' => 'end_at',
                            'value'     => function ($model) {
                                return date('Y - m -d , h:i', $model->end_at);
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
                    ],
                ]) ?>

            </div>
        </div>
    </section>
</div>


