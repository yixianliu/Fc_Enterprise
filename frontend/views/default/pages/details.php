<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/9
 * Time: 17:04
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => $result['menu']['name'], 'url' => ['list', 'id' => $result['parent']['page_id']]];
$this->params['breadcrumbs'][] = $this->title;

?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<?= $this->render('../_slide', ['PageId' => $result['parent']['page_id']]); ?>

<div class="container content">

    <?= $this->render('../_left'); ?>

    <!-- 右边 -->
    <div class="right">

        <?= $this->render('../_nav'); ?>

        <!-- 可变化内容 -->
        <div class="conY">
            <div class="conY_tit"><?= $model->title ?></div>

            <div class="conY_dat">作者：admin&nbsp;&nbsp;&nbsp;时间：<?= date('Y - m - d', $model->updated_at) ?></div>

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
    </div>
</div>