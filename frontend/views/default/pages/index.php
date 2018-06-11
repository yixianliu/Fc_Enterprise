<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\PagesClassifySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model['menu']['name'];
$this->params['breadcrumbs'][] = ['label' => $model['menu']['name'], 'url' => ['index', 'id' => $model['page_id']]];
$this->params['breadcrumbs'][] = $this->title;

?>


<style type="text/css">
    .summary {
        display: none;
    }
</style>

<?= $this->render('../_slide', ['PageId' => $model['page_id']]); ?>

<div class="container content">

    <?= $this->render('../_left'); ?>

    <!-- 右边 -->
    <div class="right">

        <?= $this->render('../_nav'); ?>

        <!-- 可变化内容 -->
        <div class="conY">
            <div class="conY_tit"><?= $result['menu']['name'] ?></div>
            <div class="conY_dat">作者：admin&nbsp;&nbsp;&nbsp;时间：<?= date('Y - m - d', $model['updated_at']) ?></div>

            <div class="conY_text">
                <?= $model['content'] ?>
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
