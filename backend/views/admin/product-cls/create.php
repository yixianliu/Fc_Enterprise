<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProductClassify */

$this->title = '创建产品分类';
$this->params['breadcrumbs'][] = ['label' => '产品分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?=
$this->render('_form', [
    'model'  => $model,
    'result' => $result,
]);
?>