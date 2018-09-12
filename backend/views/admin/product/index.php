<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品中心';
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('_search', ['model' => $searchModel, 'result' => $result]); ?>

<div class="col-lg-12">

    <?= Html::a('添加产品', ['create'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('添加产品分类', ['admin/product-cls/create'], ['class' => 'btn btn-success']) ?>

    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?></h2></header>

        <div class="content-body">

            <?php if (!empty($result['classify']) && is_array($result['classify'])): ?>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'options'      => ['class' => 'table table-hover'],
                    'columns'      => [
                        [
                            'class'   => 'yii\grid\SerialColumn',
                            'options' => ['width' => 50],
                        ],
                        'title',
                        [
                            'attribute' => 'c_key',
                            'value'     => function ($model) {

                                $data = \common\models\ProductClassify::findOne(['c_key' => $model->c_key]);

                                if (empty($data)) {
                                    return '没有分类';
                                }

                                return $data->name;
                            },
                        ],
                        [
                            'attribute' => 'is_comments',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '启用',
                                    'Off' => '未启用',
                                ];

                                return $state[$model->is_comments];
                            },
                            'options'   => ['width' => 110],
                        ],
                        [
                            'attribute' => 'is_audit',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '启用',
                                    'Off' => '未启用',
                                ];

                                return $state[$model->is_audit];
                            },
                            'options'   => ['width' => 100],
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

            <?php else: ?>

                <h3>没有产品分类, 赶紧添加 <a href="<?= \yii\helpers\Url::to(['admin/product-cls/create']) ?>">产品分类</a> !!</h3>

            <?php endif ?>

        </div>
    </section>
</div>
