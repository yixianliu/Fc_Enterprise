<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PurchaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '提交价格';
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('../slide', ['pagekey' => 'purchase']); ?>

<?= $this->render('../nav'); ?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<section class="section-wrap blog-standard" style="padding: 60px 0">
    <div class="container relative">
        <div class="row">

            <div class="col-sm-3 sidebar blog-sidebar">
                <?= $this->render('../user/_left'); ?>
            </div>

            <div class="col-sm-9 sidebar blog-sidebar">

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'options'      => ['class' => 'table table-hover'],
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'price',
                        [
                            'attribute' => 'is_type',
                            'value'     => function ($model) {
                                $state = [
                                    'Supply'   => '供应商',
                                    'Purchase' => '采购商',
                                    'Bid'      => '投标商',
                                ];

                                return $state[ $model->is_type ];
                            },
                        ],
                        [
                            'attribute' => 'is_using',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '启用',
                                    'Off' => '未启用',
                                ];

                                return $state[ $model->is_using ];
                            },
                        ],
                    ]
                ]);
                ?>
            </div>

        </div> <!-- end col -->

        <!-- sidebar -->

    </div> <!-- end row -->
    </div> <!-- end container -->
</section> <!-- end blog standard -->