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
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <?= $this->render('_search', ['model' => $searchModel]); ?>


                    <p>
                        <?= Html::a('添加新闻', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns'      => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'user_id',
                            'c_key',
                            'sort_id',
                            'title',
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);
                    ?>

                </div>
            </div>
        </div>
    </section>
</div>
