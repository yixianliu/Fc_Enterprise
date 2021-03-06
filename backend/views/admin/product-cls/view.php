<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductClassify */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '产品分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-lg-12">
    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode( $this->title ) ?></h2></header>

        <div class="content-body">
            <div class="row">

                <p>
                    <?= Html::a( '更新', ['update', 'id' => $model->c_key], ['class' => 'btn btn-primary'] ) ?>
                    <?= Html::a( '删除', ['delete', 'id' => $model->c_key], [
                        'class' => 'btn btn-danger',
                        'data'  => [
                            'confirm' => '你真的需要删除这个分类吗?',
                            'method'  => 'post',
                        ],
                    ] ) ?>
                    <?= Html::a( '返回列表', ['index'], ['class' => 'btn btn-primary'] ) ?>
                    <?= Html::a( '继续添加', ['create'], ['class' => 'btn btn-primary'] ) ?>
                </p>

                <?=
                DetailView::widget( [
                    'model'      => $model,
                    'attributes' => [
                        'c_key',
                        'sort_id',
                        'name',
                        'keywords',
                        [
                            'attribute' => 'parent_id',
                            'value'     => function ($model) {

                                if ($model->parent_id == 'C0') {
                                    return ($data['name'] = '顶级分类!');
                                }

                                $data = \common\models\ProductClassify::findOne( ['c_key' => $model->parent_id] );

                                return $data->name;
                            },
                        ],
                        [
                            'attribute' => 'is_language',
                            'value'     => function ($model) {
                                $data = \common\models\Language::findOne(['lang_key' => $model->is_language]);
                                return $data->name;
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
                                return date( 'Y - m -d , H:i:s', $model->created_at );
                            },
                        ],
                        [
                            'attribute' => 'updated_at',
                            'value'     => function ($model) {
                                return date( 'Y - m -d , H:i:s', $model->updated_at );
                            },
                        ],
                        'description:html',
                    ],
                    'template'   => '<tr><th width="200">{label}</th><td>{value}</td></tr>',
                ] );
                ?>

            </div>
        </div>
    </section>
</div>

