<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '产品中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-lg-12">
    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode( $this->title ) ?></h2></header>

        <div class="content-body">
            <div class="row">

                <h1><?= Html::encode( $this->title ) ?></h1>

                <p>
                    <?= Html::a( '更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'] ) ?>
                    <?=
                    Html::a( '删除', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data'  => [
                            'confirm' => '是否删除这条记录?',
                            'method'  => 'post',
                        ],
                    ] )
                    ?>
                    <?= Html::a( '返回列表', ['index'], ['class' => 'btn btn-primary'] ) ?>
                    <?= Html::a( '继续添加', ['create'], ['class' => 'btn btn-primary'] ) ?>
                </p>

                <?=
                DetailView::widget( [
                    'model'      => $model,
                    'attributes' => [
                        'user_id',
                        [
                            'attribute' => 'c_key',
                            'value'     => function ($model) {
                                $data = \common\models\ProductClassify::findOne( ['c_key' => $model->c_key] );
                                return $data->name;
                            },
                        ],
//                        's_key',
                        'title',
                        'price',
                        'discount',
                        'introduction',
                        'keywords',
                        [
                            'attribute' => 'thumbnail',
                            'format'    => 'html',
                            'value'     => function ($model) {

                                if (empty( $model->thumbnail ))
                                    return;

                                $data = '<div class="col-md-12">';
                                $data .= '<img width="350" height="220" src="' . Yii::getAlias( '@web/../../frontend/web/temp/product/' ) . $model->product_id . '/' . $model->thumbnail . '" />';
                                $data .= '</div>';

                                return $data;
                            },
                        ],
                        [
                            'attribute' => 'images',
                            'format'    => 'html',
                            'value'     => function ($model) {

                                $imgArray = explode( ',', $model->images );

                                $data = null;

                                foreach ($imgArray as $value) {

                                    if (empty( $value ))
                                        continue;

                                    $data .= '<div class="col-md-3">';
                                    $data .= '<img width="320" height="170" src="' . Yii::getAlias( '@web/../../frontend/web/temp/product/' ) . $model->product_id . '/' . $value . '" />';
                                    $data .= '</div>';
                                }

                                return $data;
                            },
                        ],
                        'praise',
                        'forward',
                        'collection',
                        'share',
                        'attention',
                        [
                            'attribute' => 'is_language',
                            'value'     => function ($model) {
                                $data = \common\models\Language::findOne( ['lang_key' => $model->is_language] );
                                return $data->name;
                            },
                        ],
                        [
                            'attribute' => 'is_promote',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '开启',
                                    'Off' => '未开启',
                                ];

                                return $state[ $model->is_promote ];
                            },
                        ],
                        [
                            'attribute' => 'is_hot',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '开启',
                                    'Off' => '未开启',
                                ];

                                return $state[ $model->is_hot ];
                            },
                        ],
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
                            'attribute' => 'is_using',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '通过审核',
                                    'Off' => '未通过审核',
                                ];

                                return $state[ $model->is_using ];
                            },
                        ],
                        [
                            'attribute' => 'is_comments',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '开启',
                                    'Off' => '未开启',
                                ];

                                return $state[ $model->is_comments ];
                            },
                        ],
                        'grade',
                        'user_grade',
                        [
                            'attribute' => 'created_at',
                            'value'     => function ($model) {
                                return date( 'Y - m -d , H:i:s', $model->created_at );
                            },
                        ],
                        [
                            'attribute' => 'updated_at',
                            'value'     => function ($model) {
                                return date( 'Y - m -d , H:i:s', $model->updated_at );
                            },
                        ],
                        'content:html',
                    ],
                    'template'   => '<tr><th width="200">{label}</th><td>{value}</td></tr>',
                ] );
                ?>

            </div>
        </div>
    </section>
</div>
