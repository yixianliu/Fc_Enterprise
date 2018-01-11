<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Supply */

$this->title = 'Create Supply';
$this->params['breadcrumbs'][] = ['label' => 'Supplies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supply-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
