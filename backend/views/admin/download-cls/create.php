<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DownloadCls */

$this->title = 'Create Download Cls';
$this->params['breadcrumbs'][] = ['label' => 'Download Cls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="download-cls-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
