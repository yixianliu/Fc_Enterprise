<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OnlineMsg */

$this->title = '添加留言';
$this->params['breadcrumbs'][] = ['label' => '在线留言', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

