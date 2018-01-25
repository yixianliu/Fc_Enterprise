<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Download */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Downloads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="download-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['更新', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['删除', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定是否删除这条记录?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'c_key',
            'title',
            'path',
            'content:ntext',
            [
                'attribute' => 'is_using',
                'value'     => function ($model) {
                    $state = [
                        'On'  => '开启',
                        'Off' => '未启用',
                    ];

                    return $state[ $model->is_using ];
                },
            ],
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
    ]) ?>

</div>
