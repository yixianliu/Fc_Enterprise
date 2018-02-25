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
                        'answer',
                        's_key',
                        'login_ip',
                        'consecutively',
                        'sex',
                        'is_display',
                        'is_head',
                        'is_security',
                        [
                            'attribute' => 'is_using',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '开启',
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
                ]);
                ?>

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
                        'content:ntext',
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
                        'content:ntext',
                        // 'path',
                        'price',
                        'num',
                        'unit',
                        'type',
                        'is_status',
                        // 'start_at',
                        // 'end_at',
                        'is_using',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>

            </div>
        </div>

    </section>
</div>

