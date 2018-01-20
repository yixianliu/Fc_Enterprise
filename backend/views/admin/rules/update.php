<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Rules */

$this->title = '更新规则: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => '规则列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = '更新';
?>

<?=
$this->render('_form', [
    'model' => $model,
]);
?>

