<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SlideClassify */

$this->title = '添加幻灯片分类';
$this->params['breadcrumbs'][] = ['label' => '幻灯片分类管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

