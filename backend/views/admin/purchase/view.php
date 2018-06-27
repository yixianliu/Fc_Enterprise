<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Purchase */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '采购中心', 'url' => ['index']];
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
                    <?= Html::a('删除', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data'  => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method'  => 'post',
                        ],
                    ]) ?>
                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('继续添加', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?= DetailView::widget([
                    'model'      => $model,
                    'attributes' => [
                        'purchase_id',
                        'user_id',
                        'title',
                        [
                            'attribute' => 'path',
                            'format'    => 'html',
                            'value'     => function ($model) {

                                $imgArray = explode(',', $model->path);

                                $data = null;

                                foreach ($imgArray as $value) {

                                    if (empty($value))
                                        continue;

                                    $data .= '<img width=350 height=150 src="' . Yii::getAlias('@web') . '/temp/purchase/' . $value . '" /><br /><br />';
                                }

                                return $data;
                            },
                        ],
                        'price',
                        'num',
                        'unit',
                        [
                            'attribute' => 'is_send_msg',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '群发供应商',
                                    'Off' => '不群发',
                                ];

                                return $state[ $model->is_send_msg ];
                            },
                        ],
                        [
                            'attribute' => 'is_type',
                            'value'     => function ($model) {
                                $state = [
                                    'Long' => '长期采购', 'Short' => '短期采购'
                                ];

                                return $state[ $model->is_type ];
                            },
                        ],
                        [
                            'attribute' => 'is_status',
                            'value'     => function ($model) {
                                $state = [
                                    'On' => '采购中', 'Off' => '关闭'
                                ];

                                return $state[ $model->is_status ];
                            },
                        ],
                        [
                            'attribute' => 'start_at',
                            'value'     => function ($model) {
                                return date('Y-m-d H:i', $model->start_at);
                            },
                        ],
                        [
                            'attribute' => 'end_at',
                            'value'     => function ($model) {
                                return date('Y-m-d H:i', $model->end_at);
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
                                return date('Y-m-d H:i', $model->created_at);
                            },
                        ],
                        [
                            'attribute' => 'updated_at',
                            'value'     => function ($model) {
                                return date('Y-m-d H:i', $model->updated_at);
                            },
                        ],
                        'content:html',
                    ],
                    'template'   => '<tr><th width="200">{label}</th><td>{value}</td></tr>',
                ])
                ?>

            </div>
        </div>

        <div class="content-body">
            <div class="row">

                <h3>采购信息下的价格</h3>

                <?= GridView::widget([
                    'dataProvider' => $result['offer'],
                    'columns'      => [
                        [
                            'class'   => 'yii\grid\SerialColumn',
                            'options' => ['width' => 100]
                        ],
                        [
                            'attribute' => 'price',
                            'options'   => ['width' => 150]
                        ],
                        [
                            'attribute' => 'path',
                            'format'    => 'html',
                            'value'     => function ($model) {

                                $imgArray = explode(',', $model->path);

                                $data = null;

                                foreach ($imgArray as $value) {

                                    if (empty($value))
                                        continue;

                                    $data .= '<img width=350 height=150 src="' . Yii::getAlias('@web') . '/temp/sp-offer/' . $value . '" /><br /><br />';
                                }

                                return $data;
                            },
                        ],
                        [
                            'attribute' => 'is_using',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '已采纳',
                                    'Off' => '未采纳',
                                ];

                                return $state[ $model->is_using ];
                            },
                            'options'   => ['width' => 100]
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


