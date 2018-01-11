<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Supply */

$this->title = '发布供应信息';
$this->params['breadcrumbs'][] = ['label' => '供应中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model'  => $model,
    'result' => $result
]) ?>

