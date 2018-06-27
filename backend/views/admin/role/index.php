<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '角色权限';
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
                    <?= Html::a('创建角色', ['create'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('角色', ['index'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('权限', ['admin/power/index'], ['class' => 'btn btn-success']) ?>
                </p>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        [
                            'class'   => 'yii\grid\SerialColumn',
                            'options' => ['width' => 120]
                        ],
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
                            'options'   => ['width' => 120]
                        ],
                        [
                            'attribute' => 'created_at',
                            'value'     => function ($model) {
                                return date('Y - m -d , h:i', $model->created_at);
                            },
                            'options'   => ['width' => 180]
                        ],
                        [
                            'attribute' => 'updated_at',
                            'value'     => function ($model) {
                                return date('Y - m -d , h:i', $model->updated_at);
                            },
                            'options'   => ['width' => 180]
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
