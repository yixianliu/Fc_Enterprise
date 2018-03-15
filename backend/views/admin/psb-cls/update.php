<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PsbClassify */

$this->title = '更新分类: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '相关分类中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>

<?= $this->render('_form', [
    'model'  => $model,
    'id'     => $id,
    'result' => $result,
]) ?>


