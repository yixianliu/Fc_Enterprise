<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '权限管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left"><?= Html::encode($this->title) ?></h2>
        </header>
        <div class="content-body">
            <div class="row">

                <h1><?= Html::encode($this->title) ?></h1>

                <?= $this->render('../role/_search', ['model' => $searchModel]); ?>

                <hr/>

                <p>
                    <?= Html::a('创建权限', ['create'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('权限', ['index'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('角色', ['admin/role/index'], ['class' => 'btn btn-success']) ?>
                </p>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'name',
                        'description',
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
                ]); ?>

            </div>
        </div>
    </section>
</div>

