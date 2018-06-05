<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JobSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '招聘列表';
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
                    <?= Html::a('发布招聘', ['create']) ?>
                </p>

                <hr/>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        [
                            'class'   => 'yii\grid\SerialColumn',
                            'options' => ['width' => 50]
                        ],
                        [
                            'attribute' => 'user_id',
                            'options'   => ['width' => 120]
                        ],
                        'title',
                        [
                            'attribute' => 'is_audit',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '已通过',
                                    'Off' => '未通过',
                                ];

                                return $state[ $model->is_audit ];
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
