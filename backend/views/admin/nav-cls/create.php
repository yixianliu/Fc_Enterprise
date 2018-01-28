<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\NavClassify */

$this->title = '发布导航分类';
$this->params['breadcrumbs'][] = ['label' => '导航分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

