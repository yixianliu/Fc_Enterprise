<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SinglePageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '单页面列表';
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

                <hr />

                <p>
                    <?= Html::a('创建单页面', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'page_id',
                        'name',
                        'path',
                         'is_using',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                ?>

            </div>
        </div>
    </section>
</div>

