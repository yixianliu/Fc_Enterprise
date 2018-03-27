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

<div class="right">

    <div class="col_full userdata-cont">

        <div class="cont-title">
            <span><?= $this->title ?></span>
        </div>

        <div class="row">
            <div class="col-xs-12" style="font-size: 12px;margin: 0;padding: 20px 0px;">

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
        </div>
    </div>
</div>