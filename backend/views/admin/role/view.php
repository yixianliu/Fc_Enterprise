<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ItemRp */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '角色权限', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left"><?= Html::encode($this->title) ?></h2>
        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>
                        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?=
                        Html::a('删除', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data'  => [
                                'confirm' => '是否真的需要删除这条数据?',
                                'method'  => 'post',
                            ],
                        ]);
                        ?>
                        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>
                    </p>

                    <?=
                    DetailView::widget([
                        'model'      => $model,
                        'attributes' => [
                            'name',
                            'type',
                            'rule_name',
                            'data:ntext',
                            'description',
                            [
                                'attribute' => 'created_at',
                                'value'     => function ($model) {
                                    return date('Y - m -d , h:i', $model->created_at);
                                },
                            ],
                            [
                                'attribute' => 'updated_at',
                                'value'     => function ($model) {
                                    return date('Y - m -d , h:i', $model->updated_at);
                                },
                            ],
                        ],
                    ])
                    ?>

                </div>
            </div>
        </div>
    </section>
</div>
