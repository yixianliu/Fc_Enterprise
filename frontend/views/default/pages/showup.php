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

            <ul>

                <li>
                    <a href="ucasedetailed.html"><img alt="" src="images/about-left.jpg"></a>
                    <a href=""><span>案例列表</span></a>
                </li>

                <li>
                    <a href="ucasedetailed.html"><img alt="" src="images/about-left.jpg"></a>
                    <a href=""><span>案例列表</span></a>
                </li>

                <li>
                    <a href="ucasedetailed.html"><img alt="" src="images/about-left.jpg"></a>
                    <a href=""><span>案例列表</span></a>
                </li>

                <li>
                    <a href="ucasedetailed.html"><img alt="" src="images/about-left.jpg"></a>
                    <a href=""><span>案例列表</span></a>
                </li>

                <li>
                    <a href="ucasedetailed.html"><img alt="" src="images/about-left.jpg"></a>
                    <a href=""><span>案例列表</span></a>
                </li>

                <li>
                    <a href="ucasedetailed.html"><img alt="" src="images/about-left.jpg"></a>
                    <a href=""><span>案例列表</span></a>
                </li>

                <li>
                    <a href="ucasedetailed.html"><img alt="" src="images/about-left.jpg"></a>
                    <a href=""><span>案例列表</span></a>
                </li>

                <li>
                    <a href="ucasedetailed.html"><img alt="" src="images/about-left.jpg"></a>
                    <a href=""><span>案例列表</span></a>
                </li>

                <li>
                    <a href="ucasedetailed.html"><img alt="" src="images/about-left.jpg"></a>
                    <a href=""><span>案例列表</span></a>
                </li>

                <li>
                    <a href="ucasedetailed.html"><img alt="" src="images/about-left.jpg"></a>
                    <a href=""><span>案例列表</span></a>
                </li>

            </ul>

        </div>
        <!-- 可变化内容 -->

    </div>
    <!-- 右边 -->

</div>
