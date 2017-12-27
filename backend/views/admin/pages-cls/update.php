<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PagesClassify */

$this->title = '更新单页面分类: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pages Classifies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>


<?= $this->render('_form', [
    'model'  => $model,
    'result' => $result,
]) ?>

