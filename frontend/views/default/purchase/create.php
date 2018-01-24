<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Purchase */

$this->title = '发布采购';
$this->params['breadcrumbs'][] = ['label' => '采购中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<?= $this->render('../slide', ['pagekey' => 'job']); ?>

<?= $this->render('../nav'); ?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

