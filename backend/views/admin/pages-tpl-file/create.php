<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PagesTplFile */

$this->title = '创建模板文件';
$this->params['breadcrumbs'][] = ['label' => '单页面模板文件', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
