<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品中心';
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('_search', ['model' => $searchModel, 'result' => $result]); ?>

<div class="col-lg-12">
    <section class="box ">

        <header class="panel_header">
            <h2 class="title pull-left"><?= Html::encode($this->title) ?></h2>
        </header>

        <div class="content-body">
            <div class="row">

                <p>
                    <?= Html::a('添加产品', ['create']) ?> /
                    <?= Html::a('添加产品分类', ['admin/product-cls/create']) ?>
                </p>

                <hr/>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'options'      => ['class' => 'table table-hover'],
                    'columns'      => [
                        [
                                'class' => 'yii\grid\SerialColumn',
                                'options' => ['width' => 50]
                        ],
                        'title',
                        [
                            'attribute' => 'c_key',
                            'value'     => function ($model) {

                                $data = \common\models\ProductClassify::findOne(['c_key' => $model->c_key]);

                                if (empty($data)) {
                                    return '没有分类';
                                }

                                return $data->name;
                            }
                        ],
                        [
                            'attribute' => 'is_comments',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '启用',
                                    'Off' => '未启用',
                                ];

                                return $state[ $model->is_comments ];
                            },
                            'options'   => ['width' => 110]
                        ],
                        [
                            'attribute' => 'is_audit',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '启用',
                                    'Off' => '未启用',
                                ];

                                return $state[ $model->is_audit ];
                            },
                            'options'   => ['width' => 100]
                        ],
                        [
                            'class'   => 'yii\grid\ActionColumn',
                            'options' => ['width' => 100]
                        ],
                    ]
                ]);
                ?>

            </div>
        </div>
    </section>
</div>
