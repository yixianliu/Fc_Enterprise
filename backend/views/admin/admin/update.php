<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Management */

$this->title = '更改管理员: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => '管理员列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?=
$this->render('_form', [
    'model' => $model,
])
?>