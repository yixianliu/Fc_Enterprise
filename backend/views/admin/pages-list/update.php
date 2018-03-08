<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PagesList */

$this->title = '更新内容: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '单页面列表数据', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?= $this->render('_form', [
    'model'  => $model,
    'result' => $result,
]) ?>


