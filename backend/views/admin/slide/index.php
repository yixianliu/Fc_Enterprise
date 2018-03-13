<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SlideSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '幻灯片管理';
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

                <p>
                    <?= Html::a('创建幻灯片', ['create'], ['class' => "collapsed"]) . ' / ' ?>
                    <?= Html::a('幻灯片分类', ['admin/slide-cls/index'], ['class' => "collapsed"]) . ' / ' ?>
                </p>

                <hr/>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'c_key',
                            'value'     => function ($model) {

                                $data = \common\models\SlideClassify::findAll(['is_using' => 'On']);

                                foreach ($data as $value) {
                                    $state[ $value['c_key'] ] = $value['name'];
                                }

                                $data = \common\models\Pages::findByAll(['is_using' => 'On']);

                                foreach ($data as $value) {
                                    $state[ $value['page_id'] ] = $value['menu']['name'];
                                }

                                return $state[ $model->c_key ];
                            },
                        ],
                        'path',
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
                ]);
                ?>

            </div>
        </div>
    </section>
</div>

