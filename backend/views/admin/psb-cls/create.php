<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PsbClassify */

$this->title = '添加分类';
$this->params['breadcrumbs'][] = ['label' => '相关分类中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model'  => $model,
    'id'     => $id,
    'result' => $result,
]) ?>

