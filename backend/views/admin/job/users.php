<?php
/**
 *
 * 应聘用户
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/22
 * Time: 16:31
 */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = '应聘列表';
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
                    <?= Html::a('发布招聘', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        [
                            'class'   => 'yii\grid\SerialColumn',
                            'options' => ['width' => 120]
                        ],
                        [
                            'attribute' => 'user_id',
                            'options'   => ['width' => 120]
                        ],
                        [
                            'attribute' => 'job_id',
                        ],
                        [
                            'attribute' => 'is_using',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '审核通过',
                                    'Off' => '审核未通过',
                                ];

                                return $state[ $model->is_using ];
                            },
                            'options'   => ['width' => 120]
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
                            'options' => ['width' => 120],
                        ],
                    ],
                ]);
                ?>

            </div>
        </div>
    </section>
</div>
