<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ItemRpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '角色权限';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left"><?= Html::encode($this->title) ?></h2>
        </header>
        <div class="content-body">
            <div class="row">

                <?= $this->render('_search', ['model' => $searchModel]); ?>

                <hr/>

                <p>
                    <?= Html::a('创建角色权限', ['create'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('角色', ['index', 'type' => 'role'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('权限', ['index', 'type' => 'permission'], ['class' => 'btn btn-success']) ?>
                </p>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'name',
                        [
                            'label'     => '类型',
                            'attribute' => 'type',
                            'value'     => function ($model) {
                                $state = [
                                    '1' => '角色',
                                    '2' => '权限',
                                ];

                                return $state[ $model->type ];
                            },
                        ],
                        [
                            'attribute' => 'created_at',
                            'value'     => function ($model) {
                                return date('Y - m -d , h:i', $model->created_at);
                            },
                        ],
                        [
                            'attribute' => 'updated_at',
                            'value'     => function ($model) {
                                return date('Y - m -d , h:i', $model->updated_at);
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
