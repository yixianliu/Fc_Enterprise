<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SpOffer */

$this->title = '更新价格: ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => '价格中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

