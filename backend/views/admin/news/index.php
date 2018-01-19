<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '新闻列表';
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

                <?php if (!empty($result['classify'])): ?>

                    <?= $this->render('_search', ['model' => $searchModel, 'result' => $result]); ?>

                    <hr/>

                    <p>
                        <?= Html::a('添加新闻', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns'      => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'user_id',
                            [
                                'attribute' => 'c_key',
                                'value'     => function ($model) {

                                    $data = \common\models\NewsClassify::findOne(['c_key' => $model->c_key]);

                                    return $data['name'];
                                },
                            ],
                            'sort_id',
                            'title',
                            'keywords',
                            [
                                'attribute' => 'is_audit',
                                'value'     => function ($model) {
                                    $state = [
                                        'On'  => '启用',
                                        'Off' => '未启用',
                                        'Out' => '屏蔽',
                                        'Not' => '未审核',
                                    ];

                                    return $state[ $model->is_audit ];
                                },
                            ],
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);
                    ?>

                <?php else: ?>

                    <h3>请添加分类, 点<a href="<?= \yii\helpers\Url::to(['admin/news-cls/create']) ?>">这里</a> !!</h3>

                <?php endif ?>

            </div>
        </div>
    </section>
</div>
