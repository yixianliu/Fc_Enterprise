<?php

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = '添加产品';
$this->params['breadcrumbs'][] = ['label' => '产品中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo $this->render('_form', [
    'model'  => $model,
    'result' => $result,
]);

?>