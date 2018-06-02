<?php
/**
 *
 * 展示模型单页面
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/2/7
 * Time: 16:54
 */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $model['menu']['name'];
$this->params['breadcrumbs'][] = ['label' => $result['parent']['name']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= Html::cssFile('@web/themes/qijian/css/clearbox.css') ?>
<?= Html::jsFile('@web/themes/qijian/js/clearbox.js') ?>

<!-- 隐藏显示大图上的缩略图 -->
<script type="text/javascript">
    $(function () {
        $('#CB_Thumbs').remove();
        $('#CB_ImgHide').remove();
    });
</script>

<?= $this->render('../slide', ['pagekey' => $model['page_id']]); ?>

<div class="container content">

    <?= $this->render('../_left'); ?>

    <!-- 右边 -->
    <div class="right">

        <?= $this->render('../_nav'); ?>

        <!-- 可变化内容 -->
        <div class="content_product_list">

            <?php if (!empty($result['img'])): ?>

                <ul>

                    <?php foreach ($result['img'] as $value): ?>

                        <?php if (!empty($value)): ?>

                            <li>
                                <a class="articleid" title="" href="<?= Url::to('@web/../../backend/web/temp/pages/' . $value); ?>" rel="clearbox[test1]">
                                    <div class="pro-img">
                                        <?= Html::img(Url::to('@web/../../backend/web/temp/pages/' . $value), ['alt' => '']); ?>
                                    </div>

                                    <div class="pro-txt"></div>
                                </a>
                            </li>

                        <?php endif; ?>

                    <?php endforeach; ?>

                </ul>

            <?php else: ?>

                <h1>暂无数据 !!</h1>

            <?php endif; ?>


        </div>
        <!-- 可变化内容 -->

    </div>
    <!-- 右边 -->

</div>
