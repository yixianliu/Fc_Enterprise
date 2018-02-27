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

$this->title = $model['menu']['name'];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('../slide', ['pagekey' => $model['page_id']]); ?>

<div class="container content">

    <?= $this->render('../_left', ['type' => 'pages', 'id' => $model['page_id']]); ?>

    <!-- 右边 -->
    <div class="right">

        <?= $this->render('../nav'); ?>

        <hr/>

        <!-- 可变化内容 -->
        <div class="content_product_list">

            <?php if (!empty($result['data'])): ?>
            <ul>

                <?php foreach ($result['data'] as $value): ?>
                <li>
                    <a href="ucasedetailed.html"><img alt="" src="images/about-left.jpg"></a>
                    <a href=""><span><?= $value['title'] ?></span></a>
                </li>
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
