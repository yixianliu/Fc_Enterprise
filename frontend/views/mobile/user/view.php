<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'username',
            'password',
            'r_key',
            'credit',
            'exp',
            'nickname',
            'head',
            'signature',
            'birthday',
            'answer',
            's_key',
            'login_ip',
            'consecutively',
            'sex',
            'job',
            'is_type',
            'is_display',
            'is_auth',
            'is_head',
            'is_security',
            'is_using',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
