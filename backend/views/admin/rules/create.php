<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Rules */

$this->title = '添加规则';
$this->params['breadcrumbs'][] = ['label' => '规则列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?=
$this->render('_form', [
    'model' => $model,
]);
?>

