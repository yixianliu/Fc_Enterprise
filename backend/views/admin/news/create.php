<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = '发布新闻';
$this->params['breadcrumbs'][] = ['label' => '新闻中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?=
$this->render('_form', [
    'model'  => $model,
    'result' => $result,
]);
?>