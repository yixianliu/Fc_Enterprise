<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SinglePage */

$this->title = '创建自定义页面';
$this->params['breadcrumbs'][] = ['label' => '自定义页面管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?=
$this->render('_form', [
    'model'  => $model,
    'result' => $result,
])
?>


