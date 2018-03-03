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

<?= $this->render('../slide', ['pagekey' => $result['parent']['page_id']]); ?>

<div class="container content">

    <!-- 左边 -->
    <?= $this->render('../_left', ['type' => 'pages', 'm_key' => $result['menu']['parent_id']]); ?>
    <!-- #左边 -->

    <!-- 右边 -->
    <div class="right">

        <?= $this->render('../nav'); ?>

        <hr/>

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
        <!-- #可变化内容 -->

    </div>
    <!-- 右边 -->

</div>