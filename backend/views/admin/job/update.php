<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Job */

$this->title = '更新招聘: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
