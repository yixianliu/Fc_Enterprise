<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DownloadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '下载中心';
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('_search', ['model' => $searchModel]); ?>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?></h2></header>
        <div class="content-body">
            <div class="row">

                <p>
                    <?= Html::a('发布文件', ['create']) ?> /
                    <?= Html::a('发布下载分类', ['admin/download-cls/create']) ?>
                </p>

                <hr/>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'c_key',
                            'value'     => function ($model) {

                                $data = \common\models\DownloadCls::findOne(['c_key' => $model->c_key]);

                                if (empty($data)) {
                                    return '没有分类';
                                }

                                return $data->name;
                            },
                        ],
                        'title',
                        [
                            'attribute' => 'is_using',
                            'value'     => function ($model) {

                                $state = [
                                    'On'  => '开启',
                                    'Off' => '未启用',
                                ];

                                return $state[ $model->is_using ];
                            },
                            'options'   => ['width' => 120]
                        ],
                        [
                            'attribute' => 'created_at',
                            'value'     => function ($model) {
                                return date('Y - m -d , H:i:s', $model->created_at);
                            },
                            'options'   => ['width' => 180]
                        ],
                        [
                            'attribute' => 'updated_at',
                            'value'     => function ($model) {
                                return date('Y - m -d , H:i:s', $model->updated_at);
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
