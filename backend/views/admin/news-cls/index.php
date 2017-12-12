<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsClassifySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '新闻分类列表';
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

                <hr/>

                <p>
                    <?= Html::a('创建新闻分类', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'c_key',
                        'name',
                        [
                            'attribute' => 'is_using',
                            'value'     => function ($model) {
                                $state = [
                                    'On' => '开启',
                                    'Off' => '未启用',
                                ];
                                return $state[ $model->is_using ];
                            },
                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                ?>

            </div>
        </div>
    </section>
</div>


