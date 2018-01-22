<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Resume */

$this->title = '更新简历: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => '简历中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

