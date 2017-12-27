<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PagesClassify */

$this->title = '发布单页面分类';
$this->params['breadcrumbs'][] = ['label' => '单页面分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?=
$this->render('_form', [
    'model'  => $model,
    'result' => $result,
])
?>


