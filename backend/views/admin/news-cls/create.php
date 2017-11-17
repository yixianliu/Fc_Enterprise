<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\NewsClassify */

$this->title = 'Create News Classify';
$this->params['breadcrumbs'][] = ['label' => 'News Classifies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-classify-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
