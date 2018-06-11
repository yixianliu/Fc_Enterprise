<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Purchase */

$this->title = '更新采购: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '采购中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<?= $this->render('../_slide', ['pagekey' => 'purchase']); ?>

<?= $this->render('../_nav'); ?>

<?= $this->render('_form', [
    'model'  => $model,
    'result' => $result,
]) ?>

