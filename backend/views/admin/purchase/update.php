<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Purchase */

$this->title = '更新采购: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Purchases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>


<?= $this->render('_form', [
    'model' => $model,
]) ?>

