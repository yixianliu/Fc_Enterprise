<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户中心';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_search', ['model' => $searchModel]); ?>

<div class="col-lg-12">

    <section class="box ">

        <header class="panel_header">
            <h2 class="title pull-left"><?= Html::encode($this->title) ?></h2>
        </header>

        <div class="content-body">
            <div class="row">

                <p>

                    <?= Html::a('创建用户', ['create'], ['class' => 'btn btn-success']) ?>

                    <?= Html::a('查看普通用户', ['index'], ['class' => 'btn btn-success']) ?>

                    <?= Html::a('查看管理员', ['admin/admin/index'], ['class' => 'btn btn-success']) ?>

                </p>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'options'      => ['class' => 'table table-hover'],
                    'columns'      => [
                        [
                            'class'   => 'yii\grid\SerialColumn',
                            'options' => ['width' => 100]
                        ],
                        'username',
                        [
                            'attribute' => 'r_key',
                            'options' => ['width' => 120]
                        ],
                        [
                            'attribute' => 'is_type',
                            'value'     => function ($model) {
                                $state = [
                                    'user'       => '用户',
                                    'enterprise' => '企业用户',
                                    'supplier'   => '供应商',
                                ];

                                return $state[ $model->is_type ];
                            },
                            'options' => ['width' => 120]
                        ],
                        [
                            'attribute' => 'sex',
                            'value'     => function ($model) {
                                $state = [
                                    'Male'   => '男人',
                                    'Female' => '女人',
                                ];

                                return $state[ $model->sex ];
                            },
                            'options'   => ['width' => 120]
                        ],
                        [
                            'attribute' => 'is_using',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '已启用',
                                    'Off' => '未启用',
                                    'Not' => '未审核',
                                ];

                                return $state[ $model->is_using ];
                            },
                            'options'   => ['width' => 130]
                        ],
                        [
                            'class'   => 'yii\grid\ActionColumn',
                            'options' => ['width' => 100]
                        ],
                    ],
                ]);
                ?>

            </div>
        </div>
    </section>
</div>

