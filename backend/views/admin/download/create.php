<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Download */

$this->title = '发布文件';
$this->params['breadcrumbs'][] = ['label' => '下载中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model'  => $model,
    'result' => $result,
])
?>

