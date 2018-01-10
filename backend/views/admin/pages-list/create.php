<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PagesList */

$this->title = '发布内容';
$this->params['breadcrumbs'][] = ['label' => '单页面列表数据', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model'  => $model,
    'result' => $result,
]) ?>


