<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bid */

$this->title = '更新招标: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '招标管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
