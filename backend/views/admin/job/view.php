<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Job */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '招聘中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-lg-12">
    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode( $this->title ) ?></h2></header>

        <div class="content-body">
            <div class="row">

                <p>
                    <?= Html::a( '更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'] ) ?>
                    <?= Html::a( '删除', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data'  => [
                            'confirm' => '是否删除这条记录?',
                            'method'  => 'post',
                        ],
                    ] ) ?>
                    <?= Html::a( '返回列表', ['index'], ['class' => 'btn btn-primary'] ) ?>
                    <?= Html::a( '继续添加', ['create'], ['class' => 'btn btn-primary'] ) ?>
                </p>

                <?= DetailView::widget( [
                    'model'      => $model,
                    'attributes' => [
                        'job_id',
                        'title',
                        'keywords',
                        [
                            'attribute' => 'images',
                            'format'    => 'html',
                            'value'     => function ($model) {

                                $imgArray = explode( ',', $model->images );

                                $data = null;

                                foreach ($imgArray as $value) {

                                    if (empty( $value ))
                                        continue;

                                    $data .= '<div class="col-md-3">';
                                    $data .= '<img width="320" height="170" src="' . Yii::getAlias( '@web/../../frontend/web/temp/job/' ) . $model->job_id . '/' . $value . '" />';
                                    $data .= '</div>';
                                }

                                return $data;
                            },
                        ],
                        [
                            'attribute' => 'is_audit',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '开启',
                                    'Off' => '未启用',
                                ];

                                return $state[ $model->is_audit ];
                            },
                        ],
                        [
                            'attribute' => 'created_at',
                            'value'     => function ($model) {
                                return date( 'Y - m -d , h:i', $model->created_at );
                            },
                        ],
                        [
                            'attribute' => 'updated_at',
                            'value'     => function ($model) {
                                return date( 'Y - m -d , h:i', $model->updated_at );
                            },
                        ],
                        'content:html',
                    ],
                    'template'   => '<tr><th width="200">{label}</th><td>{value}</td></tr>',
                ] ) ?>

            </div>
        </div>
    </section>
</div>

