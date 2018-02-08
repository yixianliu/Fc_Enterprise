<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/2/6
 * Time: 16:57
 */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = '采购平台';

$this->registerCssFile('@web/themes/qijian/css/nav.css');

$this->registerJsFile('@web/themes/qijian/js/jquery1.42.min.js');
$this->registerJsFile('@web/themes/qijian/js/jquery.SuperSlide.2.1.1.js');

?>

<div class="container-fluid classfi-bg">
    <div class="container shop-classfiy">
        <?= $this->render('_cls'); ?>
    </div>
</div>

<?= $this->render('../slide', ['pagekey' => 'purchase']); ?>

<!-- 数据 -->
<div class="container-fluid pur-data">
    <div class="container">

        <!-- 采购列表 -->
        <div class="data-list">

            <div class="left">
                <?= Html::img(Url::to('@web/themes/qijian/images/tender-1.jpg'), ['alt' => $this->title]); ?>
            </div>

            <div class="right">

                <div class="data-right-title">

                    <div class="data-title-left">采购寻源</div>

                    <div class="data-title-right">
                        <a title="" href="purchasing.html">更多 ></a>
                    </div>

                </div>

                <div class="data-right-list">
                    <div>
                        <ul>
                            <li>【采购】</li>
                            <li>钢材采购订单</li>
                            <li>广东 湛江</li>
                            <li><a title="" href="purchasingdetailed.html">查看详情</a></li>
                        </ul>
                    </div>

                    <div>
                        <ul>
                            <li>【采购】</li>
                            <li>采购大量抛光瓷砖</li>
                            <li>广东 湛江</li>
                            <li><a title="" href="purchasingdetailed.html">查看详情</a></li>
                        </ul>
                    </div>

                    <div>
                        <ul>
                            <li>【采购】</li>
                            <li>钢材采购订单</li>
                            <li>广东 湛江</li>
                            <li><a title="" href="purchasingdetailed.html">查看详情</a></li>
                        </ul>
                    </div>

                    <div>
                        <ul>
                            <li>【采购】</li>
                            <li>采购大量抛光瓷砖</li>
                            <li>广东 湛江</li>
                            <li><a title="" href="purchasingdetailed.html">查看详情</a></li>
                        </ul>
                    </div>

                    <div>
                        <ul>
                            <li>【采购】</li>
                            <li>钢材采购订单</li>
                            <li>广东 湛江</li>
                            <li><a title="" href="purchasingdetailed.html">查看详情</a></li>
                        </ul>
                    </div>

                    <div>
                        <ul>
                            <li>【采购】</li>
                            <li>采购大量抛光瓷砖</li>
                            <li>广东 湛江</li>
                            <li><a title="" href="purchasingdetailed.html">查看详情</a></li>
                        </ul>
                    </div>

                    <div>
                        <ul>
                            <li>【采购】</li>
                            <li>钢材采购订单</li>
                            <li>广东 湛江</li>
                            <li><a title="" href="purchasingdetailed.html">查看详情</a></li>
                        </ul>
                    </div>

                    <div>
                        <ul>
                            <li>【采购】</li>
                            <li>采购大量抛光瓷砖</li>
                            <li>广东 湛江</li>
                            <li><a title="" href="purchasingdetailed.html">查看详情</a></li>
                        </ul>
                    </div>

                    <div>
                        <ul>
                            <li>【采购】</li>
                            <li>钢材采购订单</li>
                            <li>广东 湛江</li>
                            <li><a title="" href="purchasingdetailed.html">查看详情</a></li>
                        </ul>
                    </div>

                    <div>
                        <ul>
                            <li>【采购】</li>
                            <li>采购大量抛光瓷砖</li>
                            <li>广东 湛江</li>
                            <li><a title="" href="purchasingdetailed.html">查看详情</a></li>
                        </ul>
                    </div>

                </div>

            </div>

        </div>
        <!-- 采购列表 -->

    </div>

</div>
<!-- #数据 -->

<!-- 精彩 -->
<div class="container-fluid pru-marvellous" style="background: url(<?= Url::to('@web/themes/qijian/images/guanggao.jpg') ?>) no-repeat center 0;">

    <div class="container">

        <div class="starter-template">
            <h1 class="text-center text-color">建设精彩 · 铸就未来</h1>
            <h5 class="text-center text-color">追求绿色环保、完美空间创造的精神</h5>
            <h5 class="text-center"><a class="pmarve-btn" title="" href="">咨询热线 / <span>400-12345678</span></a></h5>
        </div>

    </div>

</div>
<!-- #精彩 -->

<!-- 新闻 -->
<div class="container h-news">

    <div class="starter-template">
        <h1 class="text-center">
            <span></span>新闻资讯<span></span>
        </h1>
        <h5 class="text-center">
            NEWS TRENDS
        </h5>
    </div>

    <div class="h-news-cont">

        <div class="left">
            <a title="" href="">
                <?= Html::img(Url::to('@web/themes/qijian/images/news_big.jpg'), ['alt' => $this->title]); ?>
            </a>
        </div>

        <div class="right">
            <ul>
                <li>
                    <div class="news-left">
                        <a title="" href="">
                            <?= Html::img(Url::to('@web/themes/qijian/images/news-1.jpg'), ['alt' => $this->title]); ?>
                        </a>
                    </div>

                    <div class="news-right">
                        <a title="" href="">
                            <p>合作联盟，优势互补好经营</p>
                            <p>合作联盟，优势互补好经营,合作联盟，优势互补好经营,合作联盟，优势互补好经营,合作联盟，优势互补好经营,合作联盟，优势互补好经营,合作联盟，优势互补好经营,</p>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="news-left">
                        <a title="" href="">
                            <?= Html::img(Url::to('@web/themes/qijian/images/news-2.jpg'), ['alt' => $this->title]); ?>
                        </a>
                    </div>

                    <div class="news-right">
                        <a title="" href="">
                            <p>合作联盟，优势互补好经营</p>
                            <p>合作联盟，优势互补好经营,合作联盟，优势互补好经营,合作联盟，优势互补好经营,合作联盟，优势互补好经营,合作联盟，优势互补好经营,合作联盟，优势互补好经营,</p>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="news-left">
                        <a title="" href="">
                            <?= Html::img(Url::to('@web/themes/qijian/images/news-3.jpg'), ['alt' => $this->title]); ?>
                        </a>
                    </div>

                    <div class="news-right">
                        <a title="" href="">
                            <p>合作联盟，优势互补好经营</p>
                            <p>合作联盟，优势互补好经营,合作联盟，优势互补好经营,合作联盟，优势互补好经营,合作联盟，优势互补好经营,合作联盟，优势互补好经营,合作联盟，优势互补好经营,</p>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="news-left">
                        <a title="" href="">
                            <?= Html::img(Url::to('@web/themes/qijian/images/news-4.jpg'), ['alt' => $this->title]); ?>
                        </a>
                    </div>

                    <div class="news-right">
                        <a title="" href="">
                            <p>合作联盟，优势互补好经营</p>
                            <p>合作联盟，优势互补好经营,合作联盟，优势互补好经营,合作联盟，优势互补好经营,合作联盟，优势互补好经营,合作联盟，优势互补好经营,合作联盟，优势互补好经营,</p>
                        </a>
                    </div>
                </li>
            </ul>
        </div>

    </div>

</div>

<script type="text/javascript">

    // 商城分类插件
    $("#nav .tit").slide({
        type: "menu",
        titCell: ".mod_cate",
        targetCell: ".mod_subcate",
        delayTime: 0,
        triggerTime: 10,
        defaultPlay: false,
        returnDefault: true
    });
</script>