<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SinglePage */

$this->title = '更新单页面: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Single Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>


<?=
$this->render('_form', [
    'model' => $model,
    'result' => $result,
])
?>