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
    <div class="col-md-12">

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'options'      => ['class' => 'table table-hover'],
            'columns'      => [
                [
                    'class'   => 'yii\grid\SerialColumn',
                    'options' => ['width' => 120]
                ],
                'price',
                [
                    'attribute' => 'is_using',
                    'value'     => function ($model) {
                        $state = [
                            'On'  => '被采纳',
                            'Off' => '未采纳',
                        ];

                        return $state[ $model->is_using ];
                    },
                    'options'   => ['width' => 130]
                ],
            ]
        ]);
        ?>

    </div>
</div>