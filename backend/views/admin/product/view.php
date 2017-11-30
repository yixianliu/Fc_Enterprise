<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
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

                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>
                        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?=
                        Html::a('删除', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data'  => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method'  => 'post',
                            ],
                        ])
                        ?>
                        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>
                    </p>

                    <?= DetailView::widget([
                        'model'      => $model,
                        'attributes' => [
                            'product_id',
                            'user_id',
                            'l_key',
                            'c_key',
                            's_key',
                            'title',
                            'content:ntext',
                            'price',
                            'discount',
                            'introduction',
                            'keywords',
                            'path',
                            'praise',
                            'forward',
                            'collection',
                            'share',
                            'attention',
                            'is_promote',
                            'is_hot',
                            'is_classic',
                            'is_winnow',
                            'is_recommend',
                            'is_audit',
                            'is_field',
                            'is_comments',
                            'is_img',
                            'is_thumb',
                            'grade',
                            'user_grade',
                            'created_at',
                            'updated_at',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </section>
</div>
