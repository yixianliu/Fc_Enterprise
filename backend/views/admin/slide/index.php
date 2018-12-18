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

    <?= Html::a('创建幻灯片', ['create'], ['class' => "btn btn-primary"]) ?>

    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?></h2></header>

        <div class="content-body">
            <div class="row">

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        [
                            'class'   => 'yii\grid\SerialColumn',
                            'options' => ['width' => 100]
                        ],
                        [
                            'attribute' => 'c_key',
                            'format'    => 'html',
                            'value'     => function ($model) {

                                $html = null;

                                $data = explode( ',', $model->c_key );

                                foreach ($data as $value) {

                                    if (empty($value))
                                        continue;

                                    $dataArray = \common\models\SlideClassify::findOne( ['c_key' => $value] );

                                    $html .= '<div class="btn btn-md btn-primary">' . $dataArray->name . '</div>';
                                }

                                return $html;
                            },
                            'options' => ['width' => 350]
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

                                    $data .= '<img width=350 height=150 src="' . Yii::getAlias('@web/../../frontend/web/temp/slide/') . $value . '" /><br /><br />';
                                }

                                return $data;
                            },
                        ],
                        [
                            'attribute' => 'is_using',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '启用',
                                    'Off' => '未启用',
                                ];

                                return $state[ $model->is_using ];
                            },
                            'options'   => ['width' => 120],
                        ],
                        [
                            'attribute' => 'created_at',
                            'value'     => function ($model) {
                                return date('Y - m -d , h:i', $model->created_at);
                            },
                            'options'   => ['width' => 180],
                        ],
                        [
                            'attribute' => 'updated_at',
                            'value'     => function ($model) {
                                return date('Y - m -d , h:i', $model->updated_at);
                            },
                            'options'   => ['width' => 180],
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

