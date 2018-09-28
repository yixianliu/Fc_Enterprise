<?php
/**
 *
 * 网站配置模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/3
 * Time: 14:53
 */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = '网站配置 - ' . $type;

?>

<div class="col-lg-12">

    <?= Html::a('添加网站配置', ['create', 'type' => $type], ['class' => "btn btn-primary", 'onclick' => "return false"]) ?>

    <?= Html::a('中文版', ['index', 'type' => 'cn'], ['class' => "btn btn-primary"]) ?>

    <?= Html::a('英文版', ['index', 'type' => 'en'], ['class' => "btn btn-primary"]) ?>

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
                            'options' => ['width' => 50],
                        ],
                        [
                            'attribute' => 'name',
                            'options'   => ['width' => 180],
                        ],
                        [
                            'attribute' => 'parameter',
                            'format'    => 'html',
                            'value'     => function ($model) {

                                if ( $model->is_type == 'images' ) {

                                    if ( $model->c_key == 'WEB_LOGO' ) {
                                        return '<img width="300" height="200" src="' . Yii::getAlias('@web/../../frontend/web/temp/conf/') . $model->parameter . '" />';
                                    }

                                    return '<img width="200" height="200" src="' . Yii::getAlias('@web/../../frontend/web/temp/conf/') . $model->parameter . '" />';
                                }

                                return $model->parameter;
                            },
                        ],
                        [
                            'attribute' => 'is_language',
                            'value'     => function ($model) {

                                if ( empty($model->is_language) )
                                    return '系统配置';

                                $state = [
                                    'cn' => '中文',
                                    'en' => '英文',
                                ];

                                return $state[ $model->is_language ];
                            },
                            'options'   => ['width' => 120],
                        ],
                        [
                            'attribute' => 'is_type',
                            'value'     => function ($model) {
                                $state = [
                                    'web'    => '网站配置',
                                    'images' => '图片配置',
                                    'system' => '系统配置',
                                ];

                                return $state[ $model->is_type ];
                            },
                            'options'   => ['width' => 120],
                        ],
                        [
                            'attribute' => 'created_at',
                            'value'     => function ($model) {
                                return date('Y - m -d , h:i', $model->created_at);
                            },
                            'options'   => ['width' => 160],
                        ],
                        [
                            'attribute' => 'updated_at',
                            'value'     => function ($model) {
                                return date('Y - m -d , h:i', $model->updated_at);
                            },
                            'options'   => ['width' => 160],
                        ],
                        [
                            'class'   => 'yii\grid\ActionColumn',
                            'options' => ['width' => 80],
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