<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/6/15
 * Time: 15:24
 */

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '下载中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>


<style type="text/css">
    .summary {
        display: none;
    }
</style>

<?= $this->render('../_slide'); ?>

<div class="container content">

    <!-- 左边 -->
    <?= $this->render('../_left'); ?>
    <!-- #左边 -->

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

            <hr/>

            <div class="conY_text">

                文件 : <br/>

                <?php foreach ($model->path as $value): ?>

                    <?= Html::a($value, '../backend/web/temp/download/' . $value, ['target' => '_blank', 'title' => $model->title,]) ?>

                <?php endforeach; ?>

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
