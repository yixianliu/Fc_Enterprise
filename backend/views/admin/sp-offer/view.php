<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SpOffer */

$this->title = '采购价格';
$this->params['breadcrumbs'][] = ['label' => '价格中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-lg-12">
    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?></h2></header>

        <div class="content-body">
            <div class="row">

                <p>
                    <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('删除', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data'  => [
                            'confirm' => '是否删除这条记录?',
                            'method'  => 'post',
                        ],
                    ]) ?>
                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>
                </p>

                <?=
                DetailView::widget([
                    'model'      => $model,
                    'attributes' => [
                        [
                            'attribute' => 'offer_id',
                            'value'     => function ($model) {

                                switch ($model->is_type) {

                                    case 'Supply':
                                        $data = \common\models\Supply::findOne(['supply_id' => $model->offer_id]);
                                        break;

                                    case 'Purchase':
                                        $data = \common\models\Purchase::findOne(['purchase_id' => $model->offer_id]);
                                        break;

                                    default:
                                        return;
                                        break;
                                }

                                return $data->title;
                            },
                        ],

                        [
                            'attribute' => 'user_id',
                            'value'     => function ($model) {

                                $data = \common\models\User::findOne(['user_id' => $model->user_id]);

                                return $data->username;
                            },
                        ],
                        'price',
                        [
                            'attribute' => 'is_type',
                            'value'     => function ($model) {
                                $state = [
                                    'Supply'   => '供应',
                                    'Purchase' => '采购',
                                    'Bid'      => '投标'
                                ];

                                return $state[ $model->is_type ];
                            },
                        ],
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
                ])
                ?>

            </div>
        </div>
    </section>

</div>

