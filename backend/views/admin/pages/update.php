<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SinglePage */

$this->title = '更新单页面: ' . $model->menu->name;
$this->params['breadcrumbs'][] = ['label' => '自定义页面管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->menu->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>

<?=
$this->render('_form', [
    'model'  => $model,
    'result' => $result,
])
?>