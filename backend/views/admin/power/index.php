<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '权限管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('../role/_search', ['model' => $searchModel]); ?>

<div class="col-lg-12">

    <?= Html::a('创建权限', ['create'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('权限', ['index'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('角色', ['admin/role/index'], ['class' => 'btn btn-success']) ?>

    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?></h2></header>

        <div class="content-body">

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'columns'      => [
                    [
                        'class'   => 'yii\grid\SerialColumn',
                        'options' => ['width' => 100],
                    ],
                    'name',
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
                        'options' => ['width' => 100],
                    ],
                ],
                'tableOptions' => ['class' => 'table table-hover'],
                'pager'        => [
                    'options' => ['class' => 'pagination'],
                ],
            ]);
            ?>

        </div>
    </section>
</div>

