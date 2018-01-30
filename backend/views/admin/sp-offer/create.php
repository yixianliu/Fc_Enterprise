<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SpOffer */

$this->title = '发布对应的供应价格';
$this->params['breadcrumbs'][] = ['label' => '价格中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
