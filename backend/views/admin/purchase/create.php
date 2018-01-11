<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Purchase */

$this->title = '发布采购信息';
$this->params['breadcrumbs'][] = ['label' => '采购中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model'  => $model,
    'result' => $result,
]) ?>

