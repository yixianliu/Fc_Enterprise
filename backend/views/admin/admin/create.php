<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Management */

$this->title = 'Create Management';
$this->params['breadcrumbs'][] = ['label' => '管理员列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?=
$this->render('_form', [
    'model' => $model,
])
?>
