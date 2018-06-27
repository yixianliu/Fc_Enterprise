<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ItemRp */

$this->title = '添加权限';
$this->params['breadcrumbs'][] = ['label' => '权限管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>


