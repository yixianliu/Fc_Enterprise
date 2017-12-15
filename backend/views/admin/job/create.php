<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Job */

$this->title = '发布招聘';
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

