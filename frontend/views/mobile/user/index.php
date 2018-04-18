<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'username',
            'password',
            'r_key',
            //'credit',
            //'exp',
            //'nickname',
            //'head',
            //'signature',
            //'birthday',
            //'answer',
            //'s_key',
            //'login_ip',
            //'consecutively',
            //'sex',
            //'job',
            //'is_type',
            //'is_display',
            //'is_auth',
            //'is_head',
            //'is_security',
            //'is_using',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
