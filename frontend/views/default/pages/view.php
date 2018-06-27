<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */

$this->title = $result['menu']->name;
$this->params['breadcrumbs'][] = ['label' => $result['parent']['name']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('../_slide', ['PageId' => $model->page_id]); ?>

<!-- 左右框架 -->
<div class="container content">

    <?= $this->render('../_left'); ?>

    <!-- 右边 -->
    <div class="right">

        <?= $this->render('../_nav'); ?>

        <!-- 可变化内容 -->
        <div class="conY">
            <div class="conY_text">

                <?= $model->content ?>

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