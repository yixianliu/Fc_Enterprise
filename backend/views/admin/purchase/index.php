<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PurchaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '采购中心';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_search', ['model' => $searchModel]); ?>

<div class="col-lg-12">

    <?= Html::a('发布采购信息', ['create'], ['class' => "btn btn-primary"]) ?>
    <?= Html::a('发布采购信息分类', ['/admin/psb-cls/index', 'id' => 'P0'], ['class' => "btn btn-primary"]) ?>

    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?></h2></header>

        <div class="content-body">
            <div class="row">

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        [
                            'class'   => 'yii\grid\CheckboxColumn',
                            'name'    => 'id',
                            'options' => ['width' => 40],
                        ],
                        [
                            'class'   => 'yii\grid\SerialColumn',
                            'options' => ['width' => 100]
                        ],
                        [
                            'attribute' => 'thumbnail',
                            'format'    => 'html',
                            'value'     => function ($model) {

                                $filename = Yii::getAlias('@web/../../frontend/web/temp/purchase/') . $model->purchase_id . '/' . $model->thumbnail;

                                if ( empty($model->thumbnail) && !file_exists($filename) )
                                    $filename = Yii::getAlias('@web/../../frontend/web/img/not.jpg');

                                return '<img width="280" height="150" src="' . $filename . '" />';
                            },
                            'options'   => ['width' => 100],
                        ],
                        'title',
                        [
                            'attribute' => 'price',
                            'options'   => ['width' => 150]
                        ],
                        [
                            'attribute' => 'is_type',
                            'value'     => function ($model) {
                                $state = [
                                    'Long'  => '长期采购',
                                    'Short' => '短期采购',
                                ];

                                return $state[ $model->is_type ];
                            },
                            'options'   => ['width' => 100]
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
                            'options'   => ['width' => 100]
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
                            'options'   => ['width' => 100]
                        ],
                        [
                            'class'   => 'yii\grid\ActionColumn',
                            'options' => ['width' => 100]
                        ],
                    ],
                    'tableOptions' => ['class' => 'table table-hover'],
                    'pager'        => [
                        'options' => ['class' => 'pagination'],
                    ],
                ]);
                ?>

            </div>
        </div>
    </section>
</div>

