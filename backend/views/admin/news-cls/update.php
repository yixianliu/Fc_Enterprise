<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NewsClassify */

$this->title = '更新新闻分类: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '新闻分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>


<?=
$this->render('_form', [
    'model'  => $model,
    'result' => $result,
]);
?>
