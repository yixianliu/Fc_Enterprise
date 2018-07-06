<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => '用户中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left"><?= Html::encode($this->title) ?></h2>
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
                            'confirm' => '是否删除这条记录?',
                            'method'  => 'post',
                        ],
                    ])
                    ?>
                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('添加用户', ['create'], ['class' => 'btn btn-primary']) ?>
                </p>

                <?=
                DetailView::widget([
                    'model'      => $model,
                    'attributes' => [
                        'user_id',
                        'username',
                        'r_key',
                        'exp',
                        'credit',
                        'nickname',
                        'signature',
                        'birthday',
                        'login_ip',
                        'consecutively',
                        [
                            'attribute' => 'sex',
                            'value'     => function ($model) {
                                $state = [
                                    'Male'   => '男性',
                                    'Female' => '女性',
                                ];

                                return $state[ $model->sex ];
                            },
                        ],
                        [
                            'attribute' => 'is_display',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '已显示',
                                    'Off' => '未显示',
                                ];

                                return $state[ $model->is_display ];
                            },
                        ],
                        [
                            'attribute' => 'is_head',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '已开启',
                                    'Off' => '未启用',
                                ];

                                return $state[ $model->is_head ];
                            },
                        ],
                        [
                            'attribute' => 'is_auth',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '已开启',
                                    'Off' => '未启用',
                                ];

                                return $state[ $model->is_auth ];
                            },
                        ],
                        [
                            'attribute' => 'is_using',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '已开启',
                                    'Off' => '未启用',
                                    'Not' => '未查看',
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
                    'template' => '<tr><th width="200">{label}</th><td>{value}</td></tr>',
                ]);
                ?>

            </div>
        </div>

        <div class="content-body">
            <div class="row">

                <h3>该用户的供应商资料</h3>

                <?php if (!empty($dataSupplyProvider)): ?>

                    <?=
                    DetailView::widget([
                        'model'      => $dataSupplyProvider,
                        'attributes' => [
                            'name',
                            'content',
                            'path',
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
                        'template' => '<tr><th width="200">{label}</th><td>{value}</td></tr>',
                    ]);
                    ?>

                <?php else: ?>

                    <h5>没有填写任何商户资料 !!</h5>

                <?php endif; ?>

            </div>
        </div>

        <div class="content-body">
            <div class="row">

                <h3>该用户发布的简历</h3>

                <?=
                GridView::widget([
                    'dataProvider' => $dataJobProvider,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'title',
                        'keywords',
                        'is_audit',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                ?>

            </div>
        </div>

        <div class="content-body">
            <div class="row">

                <h3>该用户发布的采购信息</h3>

                <?= GridView::widget([
                    'dataProvider' => $dataPurchaseProvider,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'title',
                        'price',
                        'num',
                        'unit',
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
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>

            </div>
        </div>

    </section>
</div>

