<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ItemRp */

$this->title = '创建角色权限';
$this->params['breadcrumbs'][] = ['label' => '角色权限', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?=
$this->render('_form', [
    'model'  => $model,
    'result' => $result,
]);
?>
