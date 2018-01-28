<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NavClassify */

$this->title = '更新分类: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '导航分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
