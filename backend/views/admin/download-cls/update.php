<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DownloadCls */

$this->title = '更新分类: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '下载分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->c_key]];
$this->params['breadcrumbs'][] = '更新';
?>

<?= $this->render('_form', [
    'model'  => $model,
    'result' => $result,
]) ?>


