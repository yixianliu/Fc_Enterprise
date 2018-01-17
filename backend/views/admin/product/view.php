<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
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
                    <?=
                    Html::a('删除', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data'  => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method'  => 'post',
                        ],
                    ])
                    ?>
                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>
                </p>

                <?=
                DetailView::widget([
                    'model'      => $model,
                    'attributes' => [
                        'product_id',
                        'user_id',
                        [
                            'attribute' => 'c_key',
                            'value'     => function ($model) {

                                $data = \common\models\ProductClassify::findOne(['c_key' => $model->c_key]);

                                return $data->name;
                            },
                        ],
                        's_key',
                        'title',
                        'content:ntext',
                        'price',
                        'discount',
                        'introduction',
                        'keywords',
                        'path',
                        'images',
                        'praise',
                        'forward',
                        'collection',
                        'share',
                        'attention',
                        'is_promote',
                        'is_hot',
                        [
                            'attribute' => 'is_classic',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '开启',
                                    'Off' => '未开启',
                                ];

                                return $state[ $model->is_classic ];
                            },
                        ],
                        [
                            'attribute' => 'is_winnow',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '开启',
                                    'Off' => '未开启',
                                ];

                                return $state[ $model->is_winnow ];
                            },
                        ],
                        [
                            'attribute' => 'is_recommend',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '开启',
                                    'Off' => '未开启',
                                ];

                                return $state[ $model->is_recommend ];
                            },
                        ],
                        [
                            'attribute' => 'is_audit',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '通过审核',
                                    'Off' => '未通过审核',
                                ];

                                return $state[ $model->is_audit ];
                            },
                        ],
                        'is_field',
                        'is_comments',
                        'is_img',
                        'is_thumb',
                        'grade',
                        'user_grade',
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
                ]);
                ?>

            </div>
        </div>
    </section>
</div>
