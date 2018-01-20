<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PsbClassifySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '分类列表';
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

                <?= $this->render('_search', ['model' => $searchModel]); ?>

                <p>

                    <?= Html::a('发布分类', ['create'], ['class' => 'btn btn-success']) ?>

                    <?= Html::a('供应中心分类', ['index', 'type' => 'Supply'], ['class' => 'btn btn-success']) ?>

                    <?= Html::a('采购中心分类', ['index', 'type' => 'Purchase'], ['class' => 'btn btn-success']) ?>

                    <?= Html::a('投标中心分类', ['index', 'type' => 'Bid'], ['class' => 'btn btn-success']) ?>

                </p>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'c_key',
                        'sort_id',
                        'name',
                        'is_type',
                        [
                            'attribute' => 'is_using',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '启用',
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

        <?= $this->render('../../formMsg'); ?>

    </section>
</div>

