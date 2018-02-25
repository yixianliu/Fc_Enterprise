<?php

/* @var $this yii\web\View */
/* @var $model common\models\Purchase */

$this->title = '更新采购信息: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '采购中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>

<?= $this->render('_form', [
    'model'  => $model,
    'result' => $result,
]) ?>

