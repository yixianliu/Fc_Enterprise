<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Supply */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Supplies', 'url' => ['index']];
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

                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?=
                    Html::a('删除', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data'  => [
                            'confirm' => '是否删除这条记录?',
                            'method'  => 'post',
                        ],
                    ])
                    ?>
                    <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>
                </p>

                <?=
                DetailView::widget([
                    'model'      => $model,
                    'attributes' => [
                        'c_key',
                        'supply_id',
                        'user_id',
                        'title',
                        'content:ntext',
                        'path',
                        'price',
                        'num',
                        'unit',
                        'is_type',
                        'is_status',
                        'start_at',
                        'end_at',
                        'is_send_msg',
                        'is_using',
                        'created_at',
                        'updated_at',
                    ],
                ]);
                ?>

            </div>
        </div>
    </section>
</div>



