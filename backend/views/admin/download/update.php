<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Download */

$this->title = '更新内容: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '下载中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>

<?= $this->render('_form', [
    'model'  => $model,
    'result' => $result,
]) ?>

