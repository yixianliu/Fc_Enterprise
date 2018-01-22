<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Resume */

$this->title = '发布简历';
$this->params['breadcrumbs'][] = ['label' => '简历中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

