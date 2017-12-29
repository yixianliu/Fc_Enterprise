<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SinglePage */

$this->title = '创建单页面';
$this->params['breadcrumbs'][] = ['label' => '单页面管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?=
$this->render('_form', [
    'model' => $model,
    'result' => $result,
])
?>


