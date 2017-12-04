<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Slide */

$this->title = '发布幻灯片';
$this->params['breadcrumbs'][] = ['label' => '幻灯片', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
    'model' => $model,
]);

?>

