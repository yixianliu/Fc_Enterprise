<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Slide */

$this->title = '更新幻灯片: ' . $model->slide_id;
$this->params['breadcrumbs'][] = ['label' => 'Slides', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->slide_id, 'url' => ['view', 'id' => $model->slide_id]];
$this->params['breadcrumbs'][] = '更新';

echo $this->render('_form', [
    'model'  => $model,
    'result' => $result,
]);

?>
