<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '新闻', 'url' => ['index']];
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
                    <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?=
                    Html::a('删除', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data'  => [
                            'confirm' => '确认要删除这条新闻吗?',
                            'method'  => 'post',
                        ],
                    ])
                    ?>
                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('继续添加', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?=
                DetailView::widget([
                    'model'      => $model,
                    'attributes' => [
                        [
                            'attribute' => 'c_key',
                            'value'     => function ($model) {
                                $data = \common\models\NewsClassify::findOne(['c_key' => $model->c_key]);
                                return $data->name;
                            },
                        ],
                        'sort_id',
                        'title',
                        'introduction',
                        'keywords',
                        'praise',
                        'forward',
                        'collection',
                        'share',
                        'attention',
                        'is_promote',
                        'is_hot',
                        'is_winnow',
                        'is_recommend',
                        [
                            'attribute' => 'is_audit',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '已通过审核',
                                    'Off' => '未通过审核',
                                ];

                                return $state[ $model->is_audit ];
                            },
                        ],
                        [
                            'attribute' => 'is_comments',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '已启用',
                                    'Off' => '未启用',
                                ];

                                return $state[ $model->is_audit ];
                            },
                        ],
                        'is_img',
                        'is_thumb',
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
                        'content:html',
                    ],
                    'template' => '<tr><th width="200">{label}</th><td>{value}</td></tr>',
                ]);
                ?>

            </div>
        </div>
    </section>
</div>
