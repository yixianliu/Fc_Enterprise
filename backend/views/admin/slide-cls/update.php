<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SlideClassify */

$this->title = '更新分类: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => '幻灯片分类管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

