<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PurchaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '采购中心';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/themes/qijian/css/purchasing.css');
?>

<?= $this->render('../slide', ['pagekey' => 'purchase']); ?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<!-- 左右框架 -->
<div class="container content">

    <!-- 左边 -->
    <div class="left">

        <div class="box">热门采购</div>

        <!-- 相关分类
        <?= $this->render('../cls', ['result' => $result, 'type' => 'purchase']); ?>
        相关分类 -->

        <div class="cat_list">
            <a href="#"><div>金属</div></a>
            <a href="#"><div>木材</div></a>
            <a href="#"><div>竹</div></a>
        </div>

        <div class="contact">

            <?= Html::img(Url::to('@web/themes/qijian/images/contact.jpg'), ['alt' => '']); ?>

            <ul class="contact_us">
                <li>公司名称：广东省湛江市XXXXXX</li>
                <li>联系人：XXX</li>
                <li>联系电话：XXXXXXXXXXX</li>
                <li>公司地址：湛江七建</li>
            </ul>
        </div>

    </div>
    <!-- #左边 -->

    <!-- 右边 -->
    <div class="right">

        <!-- 当前位置 -->
        <?= $this->render('../nav'); ?>
        <!-- #当前位置 -->

        <!-- 多项选择 -->
        <div class="corre-nav">
            <ul class="nav nav-pills">
                <li><a title="" href="">综合</a></li>
                <li><a title="" href="">人气</a></li>
                <li><a title="" href="">销量</a></li>
                <li class="dropdown">
                    <a title="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false" href="">
                        全国地区
                        <!-- 三角形图标 -->
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a title="" href="">赤坎</a></li>
                        <li><a title="" href="">霞山</a></li>
                        <li><a title="" href="">麻章</a></li>
                        <li><a title="" href="">徐闻</a></li>
                        <li><a title="" href="">雷州</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a title="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false" href="">
                        价钱排序
                        <!-- 三角形图标 -->
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a title="" href="">价格从低到高</a></li>
                        <li><a title="" href="">价格从高到低</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- #多项选择 -->

        <!-- 可变化内容 -->
        <div class="content_product_list">
            <ul>
                <?=
                ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView'     => '_list',
                    'viewParams'   => [
                        'fullView' => true,
                        'context'  => 'main-page',
                    ]
                ]);
                ?>
            </ul>
        </div>
        <!-- #可变化内容 -->

    </div>
    <!-- 右边 -->


</div>
<!-- 左右框架 -->