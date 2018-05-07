<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ItemRp */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '权限管理', 'url' => ['index']];
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
                        <?= Html::a('更新', ['update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('删除', ['delete', 'id' => $model->name], [
                            'class' => 'btn btn-danger',
                            'data'  => [
                                'confirm' => '删除这条权限记录?',
                                'method'  => 'post',
                            ],
                        ]) ?>
                        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>
                    </p>

                    <?= DetailView::widget([
                        'model'      => $model,
                        'attributes' => [
                            'name',
                            'type',
                            'rule_name',
                            'data:ntext',
                            'description',
                            'created_at',
                            'updated_at',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </section>
</div>
