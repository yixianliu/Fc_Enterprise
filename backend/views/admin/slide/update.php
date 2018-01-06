<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Slide */

$this->title = '更新幻灯片: ' . $model->c_key;
$this->params['breadcrumbs'][] = ['label' => '幻灯片管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->c_key, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';

echo $this->render('_form', [
    'model'  => $model,
    'result' => $result,
]);

?>
