<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DownloadCls */

$this->title = '创建下载分类';
$this->params['breadcrumbs'][] = ['label' => '下载分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model'  => $model,
    'result' => $result,
]) ?>

