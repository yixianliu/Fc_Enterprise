<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Supply */

$this->title = '更新供应: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => '供应中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<?= $this->render('../_slide'); ?>

<?= $this->render('../_nav'); ?>

<?= $this->render('_form', [
    'model'  => $model,
    'result' => $result,
]) ?>

