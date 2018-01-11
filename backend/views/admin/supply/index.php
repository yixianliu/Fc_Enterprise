<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SupplySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '供应中心';
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

                <?= $this->render('_search', ['model' => $searchModel]); ?>

                <hr/>

                <p>
                    <?= Html::a('发布供应信息', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'c_key',
                        'supply_id',
                        'user_id',
                        'title',
                        'price',
                        'num',
                        'unit',
                        'is_type',
                        'is_status',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>

            </div>
        </div>
    </section>
</div>

