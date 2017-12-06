<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ItemRp */

$this->title = '更新角色权限: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '角色权限', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = '更新';
?>

<?=
$this->render('_form', [
    'model' => $model,
]);
?>
