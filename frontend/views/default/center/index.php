<?php
/**
 *
 * 首页模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/10/13
 * Time: 9:43
 */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = '首页';

?>

<?= $this->render('../slide', ['pagekey' => 'index']); ?>

<!-- 数据 -->
<div class="container-fluid advantage">

    <div class="container">

        <ul>
            <li class="col-xs-3">
                <div class="ad-num">2454</div>
                <div class="ad-text">服务客户</div>
            </li>

            <li class="col-xs-3">
                <div class="ad-num">1242</div>
                <div class="ad-text">精彩案例</div>
            </li>

            <li class="col-xs-3">
                <div class="ad-num">152</div>
                <div class="ad-text">员工</div>
            </li>

            <li class="col-xs-3">
                <div class="ad-num">1258</div>
                <div class="ad-text">好评</div>
            </li>
        </ul>

    </div>

</div>
<!-- #数据 -->

<!-- 关于我们 -->
<div class="container-fluid about_us">

    <div class="container">

        <div class="left">
            <?= Html::img(Url::to('@web/themes/qijian/images/about-left.png'), ['alt' => '']); ?>
        </div>

        <div class="right">
            <p>公司概况</p>
            <p>
                湛江市第七建筑工程有限公司，原湛江市第七建筑工程公司，成立于1982年9月24日，于2010年8月整体产权转让并进行了企业改制重组，更名为湛江市第七建筑工程有限公司，现法定代表人为吴其远先生。
            </p>

            <p>
                <a title="" href="">查看更多</a>
            </p>
        </div>
    </div>

</div>
<!-- #关于我们 -->

<!-- 服务范围 -->
<div class="container-fluid home-ser">

    <div class="container">

        <div class="starter-template">
            <h1 class="text-center">各项服务范围</h1>
            <h5 class="text-center">SCOPE OF SERVICES</h5>
        </div>

        <div class="ser-cont">

            <div class="left">

                <div>
                    <a title="" href="<?= Url::to(['/purchase/center']) ?>">
                        <?= Html::img(Url::to('@web/themes/qijian/images/ser-left-1.jpg'), ['alt' => '']); ?>
                    </a>
                </div>

                <div>
                    <a title="" href="<?= Url::to(['/purchase/center']) ?>">
                        <?= Html::img(Url::to('@web/themes/qijian/images/ser-left-2.jpg'), ['alt' => '']); ?>
                    </a>
                </div>

            </div>

            <div class="right">

                <div class="ser-right-title">
                    <a title="" href="<?= Url::to(['/purchase/center']) ?>">
                        <?= Html::img(Url::to('@web/themes/qijian/images/ser-right-1.jpg'), ['alt' => '']); ?>
                    </a>
                </div>

                <div class="ser-right-cont">

                    <div class="ser-right-left">

                        <div>
                            <a title="" href="<?= Url::to(['/purchase/center']) ?>">
                                <?= Html::img(Url::to('@web/themes/qijian/images/ser-right-2.jpg'), ['alt' => '']); ?>
                            </a>
                        </div>

                        <div>
                            <a title="" href="<?= Url::to(['/purchase/center']) ?>">
                                <?= Html::img(Url::to('@web/themes/qijian/images/ser-right-3.jpg'), ['alt' => '']); ?>
                            </a>
                        </div>

                    </div>

                    <div class="ser-right-right">

                        <div>
                            <a title="" href="<?= Url::to(['/purchase/center']) ?>">
                                <?= Html::img(Url::to('@web/themes/qijian/images/ser-right-4.jpg'), ['alt' => '']); ?>
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<!-- #服务范围 -->

<!-- 项目介绍 -->
<div class="container-fluid home-case-cont">
    <div class="container">
        <div class="starter-template">
            <h1 class="text-center">
                <span></span>工程案例<span></span>
            </h1>
            <h5 class="text-center">
                ENGINEERING CASE
            </h5>
        </div>
    </div>
</div>

<div class="container-fluid home-case-list" style="background-image: url(<?= Yii::getAlias('@web') ?>/themes/qijian/images/pro-bg.jpg)">

    <div class="container">

        <div class="acttabbox">

            <ul class="tabcon">
                <li>
                    <a href="" target="_blank">
                        <?= Html::img(Url::to('@web/themes/qijian/images/T1XXb8XjtXXXak1cjj-702-300.jpg'), ['alt' => '']); ?>
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <?= Html::img(Url::to('@web/themes/qijian/images/T1XXb8XjtXXXak1cjj-702-300.jpg'), ['alt' => '']); ?>
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <?= Html::img(Url::to('@web/themes/qijian/images/T1XXb8XjtXXXak1cjj-702-300.jpg'), ['alt' => '']); ?>
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <?= Html::img(Url::to('@web/themes/qijian/images/T1XXb8XjtXXXak1cjj-702-300.jpg'), ['alt' => '']); ?>
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <?= Html::img(Url::to('@web/themes/qijian/images/T1XXb8XjtXXXak1cjj-702-300.jpg'), ['alt' => '']); ?>
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <?= Html::img(Url::to('@web/themes/qijian/images/T1XXb8XjtXXXak1cjj-702-300.jpg'), ['alt' => '']); ?>
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <?= Html::img(Url::to('@web/themes/qijian/images/T1XXb8XjtXXXak1cjj-702-300.jpg'), ['alt' => '']); ?>
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <?= Html::img(Url::to('@web/themes/qijian/images/T1XXb8XjtXXXak1cjj-702-300.jpg'), ['alt' => '']); ?>
                    </a>
                </li>
            </ul>

            <ul class="tabnav">

                <li class="cur">
                    <a href="" target="_blank">
                        <span class="pro-icon"></span>第七建筑工程项目
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <span class="pro-icon"></span>第七建筑工程项目
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <span class="pro-icon"></span>第七建筑工程项目
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <span class="pro-icon"></span>第七建筑工程项目
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <span class="pro-icon"></span>第七建筑工程项目
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <span class="pro-icon"></span>第七建筑工程项目
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <span class="pro-icon"></span>第七建筑工程项目
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <span class="pro-icon"></span>第七建筑工程项目
                    </a>
                </li>
            </ul>
        </div>

    </div>

</div>

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
                <?= Html::img(Url::to('@web/themes/qijian/images/news_big.jpg'), ['alt' => '']); ?>
            </a>
        </div>

        <div class="right">

            <?php if (!empty($result['news'])): ?>

                <ul>

                    <?php foreach ($result['news'] as $value): ?>
                        <li>
                            <div class="news-left">
                                <a title="<?= $value['title'] ?>" href="<?= Url::to(['/news/view', 'id' => $value['news_id']]) ?>">
                                    <?= Html::img(Url::to('@web/themes/qijian/images/news-1.jpg'), ['alt' => $value['title']]); ?>
                                </a>
                            </div>

                            <div class="news-right">
                                <a title="<?= $value['title'] ?>" href="<?= Url::to(['/news/view', 'id' => $value['news_id']]) ?>">
                                    <p><?= $value['title'] ?></p>
                                    <p><?= $value['introduction'] ?></p>
                                </a>
                            </div>
                        </li>
                    <?php endforeach; ?>

                </ul>

            <?php else: ?>

            <h1>暂无新闻 !!</h1>

            <?php endif; ?>

        </div>
    </div>

</div>
<!-- #新闻 -->

<!-- 精彩 -->
<div class="container-fluid h-job">
    <div class="container">
        <div class="starter-template">
            <h1 class="text-center text-color"><span style="color: #cf0d15;font-weight: bold;">建筑辅材</span> 采购招标火热招募中</h1>
            <h5 class="text-center text-color">追求绿色环保、完美空间创造的精神</h5>
            <h5 class="text-center"><a class="hjob-btn" title="" href="<?= Url::to(['/purchase/center']) ?>">立即前往 >></a></h5>
        </div>
    </div>
</div>
<!-- #精彩 -->
