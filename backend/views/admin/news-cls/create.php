<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\NewsClassify */

$this->title = '创建新闻分类';
$this->params['breadcrumbs'][] = ['label' => '新闻分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?=
$this->render('_form', [
    'model'  => $model,
    'result' => $result,
]);
?>
