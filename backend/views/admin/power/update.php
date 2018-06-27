<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ItemRp */

$this->title = '更新权限: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '权限管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = '更新';
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

