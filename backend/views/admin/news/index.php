<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '新闻列表';
$this->params[ 'breadcrumbs' ][] = $this->title;

?>

<?= $this->render('_search', [ 'model' => $searchModel, 'result' => $result ]); ?>

<div class="col-lg-12">
    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?></h2></header>

        <div class="content-body">
            <div class="row">

                <?php if ( !empty($result[ 'classify' ]) ): ?>

                    <p>
                        <?= Html::a('添加新闻', [ 'create' ], [ 'class' => 'btn btn-success' ]) ?>
                    </p>

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns'      => [
                            [
                                'class'   => 'yii\grid\SerialColumn',
                                'options' => [ 'width' => 100 ],
                            ],
                            [
                                'attribute' => 'thumbnail',
                                'format'    => 'html',
                                'value'     => function ($model) {

                                    $filename = Yii::getAlias('@web/../../frontend/web/temp/news/') . $model->news_id . '/' . $model->thumbnail;

                                    if ( empty($model->thumbnail) && !file_exists($filename) )
                                        $filename = Yii::getAlias('@web/../../frontend/web/img/not.jpg');

                                    return '<img width="280" height="150" src="' . $filename . '" />';
                                },
                                'options'   => ['width' => 100],
                            ],
                            [
                                'attribute' => 'c_key',
                                'value'     => function ($model) {

                                    $data = \common\models\NewsClassify::findOne([ 'c_key' => $model->c_key ]);

                                    return $data[ 'name' ];
                                },
                            ],
                            [
                                'attribute' => 'sort_id',
                                'options'   => [ 'width' => 100 ],

                            ],
                            'title',
                            [
                                'attribute' => 'is_using',
                                'value'     => function ($model) {
                                    $state = [
                                        'On'  => '启用',
                                        'Off' => '未启用',
                                        'Out' => '屏蔽',
                                        'Not' => '未审核',
                                    ];

                                    return $state[ $model->is_using ];
                                },
                                'options'   => [ 'width' => 110 ],
                            ],
                            [
                                'attribute' => 'updated_at',
                                'value'     => function ($model) {
                                    return date('Y - m -d , h:i', $model->updated_at);
                                },
                                'options'   => [ 'width' => 180 ],
                            ],
                            [
                                'class'   => 'yii\grid\ActionColumn',
                                'options' => [ 'width' => 100 ],
                            ],
                        ],
                        'tableOptions' => [ 'class' => 'table table-hover' ],
                        'pager'        => [
                            'options' => [ 'class' => 'pagination' ],
                        ],
                    ]);
                    ?>

                <?php else: ?>

                    <h3>请添加分类, 点<a href="<?= \yii\helpers\Url::to([ 'admin/news-cls/create' ]) ?>">这里</a> !!</h3>

                <?php endif ?>

            </div>
        </div>
    </section>
</div>
