<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */

$this->title = $result['menu']->name;
$this->params['breadcrumbs'][] = ['label' => $result['menu']['name'], 'url' => ['index', 'id' => $model->c_key]];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('../slide', ['pagekey' => $model->page_id]); ?>


<!-- 左右框架 -->
<div class="container content">

    <?= $this->render('../_left', ['type' => 'pages', 'id' => $model['page_id']]); ?>

    <!-- 右边 -->
    <div class="right">

        <?= $this->render('../nav'); ?>

        <hr/>

        <!-- 可变化内容 -->
        <div class="conY">
            <div class="conY_text">
                <p style="font-size:26px;"><strong>广东省湛江市七建有限公司</strong></p>
                <p style="font-size: 16px;">财富热线<span style="font-size: 16px;">：0759-XXXXXXX</span></p>
                <p style="font-size:16px;"><strong>地址：</strong>广东省湛江市XXXXXX</p>
            </div>
            <div class="conY_fanye">
                <div class="conY_fanyel">
                    上一篇：<a href="#" title="">上一篇</a>
                </div>
                <div class="conY_fanyer">
                    下一篇：<a href="#" title="">下一篇</a>
                </div>
            </div>
        </div>
        <!-- #可变化内容 -->

    </div>
    <!-- 右边 -->

</div>