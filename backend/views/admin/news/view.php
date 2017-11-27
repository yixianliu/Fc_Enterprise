<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确认要删除这条新闻吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'news_id',
            'user_id',
            'c_key',
            'sort_id',
            'title',
            'content:ntext',
            'introduction',
            'keywords',
            'praise',
            'forward',
            'collection',
            'share',
            'attention',
            'is_promote',
            'is_hot',
            'is_winnow',
            'is_recommend',
            'is_audit',
            'is_comments',
            'is_img',
            'is_thumb',
            'published',
        ],
    ]);
    ?>

</div>
