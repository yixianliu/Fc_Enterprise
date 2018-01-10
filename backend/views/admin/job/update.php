<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Job */

$this->title = '更新招聘: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '招聘中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>

<?=
$this->render('_form', [
    'model' => $model,
]);
?>
