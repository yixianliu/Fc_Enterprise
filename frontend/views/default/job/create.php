<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Job */

$this->title = '发布招聘';
$this->params['breadcrumbs'][] = ['label' => '招聘中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
    .summary {display: none;}
</style>

<?= $this->render('../slide', ['pagekey' => 'job']); ?>

<?= $this->render('../nav'); ?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
