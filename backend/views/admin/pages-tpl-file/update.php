<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PagesTplFile */

$this->title = '更新模板文件: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => '单页面模板文件', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>

<?= $this->render('_form', [
    'model'  => $model,
    'result' => $result,
]) ?>