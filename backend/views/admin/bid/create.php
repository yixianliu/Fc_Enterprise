<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Bid */

$this->title = '添加招标';
$this->params['breadcrumbs'][] = ['label' => '招标管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
