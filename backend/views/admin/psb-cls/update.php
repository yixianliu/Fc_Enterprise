<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PsbClassify */

$this->title = '更新分类: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => '分类列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


