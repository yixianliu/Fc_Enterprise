<?php
/**
 *
 * 用户中心布局模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/2/5
 * Time: 16:06
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use frontend\assets\QijianAsset;
use common\models\Menu;
use common\widgets\iConf\ConfList;

QijianAsset::register($this);

$ClsMenu = new Menu();

$this->beginPage();

$this->registerCssFile('@web/themes/qijian/css/user.css');

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>

    <?= ConfList::widget(['config' => [$this->title, 'head']]); ?>

    <?php $this->head() ?>

</head>

<body>

<?php $this->beginBody() ?>

<!-- LOGO, 导航菜单 -->
<nav class="navbar navbar-default">

    <div class="container">

        <!-- LOGO -->
        <div class="col-xs-2">
            <a class="navbar-brand" title="" href="../index.html">
                <?= Html::img(Url::to('@web/themes/qijian/images/logo.jpg'), ['alt' => '']); ?>
            </a>
        </div>
        <!-- #LOGO -->

        <!-- 菜单导航 -->
        <div class="col-xs-5">

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav nav-pills">
                    <li><a title="" href="user-config.html">首页</a></li>
                    <li class="dropdown">
                        <a title="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false" href="">
                            用户设置
                            <!-- 三角形图标 -->
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a title="" href="user-security-setting.html">安全设置</a></li>
                            <li><a title="" href="user-data.html">个人资料</a></li>
                            <li><a title="" href="user-pwd.html">个人密码</a></li>
                            <li><a title="" href="user-history.html">足迹历史</a></li>
                        </ul>
                    </li>
                    <li><a title="" href="ucase.html">工作人员</a></li>
                </ul>
            </div>

        </div>
        <!-- 菜单导航 -->

        <!-- 搜索 -->
        <div class="col-xs-5 search">

            <form name="search" action="">

                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">产品 <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a title="" href="">金属</a></li>
                            <li><a title="" href="">木材</a></li>
                            <li><a title="" href="">竹</a></li>
                        </ul>
                    </div>
                    <input type="text" class="form-control" aria-label="请输入您要查询的关键字" placeholder="请输入您要查询的关键字">
                    <span class="input-group-btn">
                                <a class="btn btn-red" title="" href="product.html">搜索</a>
                            </span>
                </div>

            </form>

        </div>
        <!-- #搜索 -->

    </div>

</nav>
<!-- #LOGO, 导航菜单 -->

<!-- 左右框架 -->
<div class="container-fluid user-config">

    <div class="container content">

        <?= $this->render('../user/_left'); ?>

        <!-- 右边 -->
        <div class="right">

            <!-- 右边 - 左边 -->
            <div class="col-lg-8">

                <!-- 1 -->
                <div class="col_full">

                    <div class="cont-title">
                        <span>我关注的商品</span>
                        <span><a title="" href="">更多</a></span>
                    </div>

                    <div class="row shop-cont">

                        <div class="col-md-4">
                            <div class="shop-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="shop-txt">
                                <a title="" href="">七建产品</a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="shop-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="shop-txt">
                                <a title="" href="">七建产品</a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="shop-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="shop-txt">
                                <a title="" href="">七建产品</a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="shop-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="shop-txt">
                                <a title="" href="">七建产品</a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="shop-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="shop-txt">
                                <a title="" href="">七建产品</a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="shop-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="shop-txt">
                                <a title="" href="">七建产品</a>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- #1 -->

                <!-- 2 -->
                <div class="col_full" style="margin-top: 20px;">

                    <div class="cont-title">
                        <span>我关注的商品</span>
                        <span><a title="" href="">更多</a></span>
                    </div>

                    <div class="row shop-cont">

                        <div class="col-md-4">
                            <div class="shop-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="shop-txt">
                                <a title="" href="">七建产品</a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="shop-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="shop-txt">
                                <a title="" href="">七建产品</a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="shop-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="shop-txt">
                                <a title="" href="">七建产品</a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="shop-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="shop-txt">
                                <a title="" href="">七建产品</a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="shop-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="shop-txt">
                                <a title="" href="">七建产品</a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="shop-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="shop-txt">
                                <a title="" href="">七建产品</a>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- #2 -->

            </div>
            <!-- #右边 - 左边 -->

            <!-- 右边 - 右边 -->
            <div class="col-xs-4">

                <!-- 1 -->
                <div class="col_full">

                    <div class="cont-title">
                        <span>促销节日</span>
                        <span><a title="" href=''>更多</a></span>
                    </div>

                    <div class="row re-cont">

                        <div class="col-md-6">
                            <div class="re-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="re-txt">
                                <p><a title="" href="">七建产品</a></p>
                                <p>店主: 啊啊啊啊啊</p>
                                <p>信誉值: 999999</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="re-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="re-txt">
                                <p><a title="" href="">七建产品</a></p>
                                <p>店主: 啊啊啊啊啊</p>
                                <p>信誉值: 999999</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="re-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="re-txt">
                                <p><a title="" href="">七建产品</a></p>
                                <p>店主: 啊啊啊啊啊</p>
                                <p>信誉值: 999999</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="re-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="re-txt">
                                <p><a title="" href="">七建产品</a></p>
                                <p>店主: 啊啊啊啊啊</p>
                                <p>信誉值: 999999</p>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- #1 -->

                <!-- 2 -->
                <div class="col_full" style="margin-top: 20px;">

                    <div class="cont-title">
                        <span>热销产品</span>
                        <span><a title="" href=''>更多</a></span>
                    </div>

                    <div class="row re-cont">

                        <div class="col-md-6">
                            <div class="re-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="re-txt">
                                <p><a title="" href="">七建产品</a></p>
                                <p>店主: 啊啊啊啊啊</p>
                                <p>信誉值: 999999</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="re-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="re-txt">
                                <p><a title="" href="">七建产品</a></p>
                                <p>店主: 啊啊啊啊啊</p>
                                <p>信誉值: 999999</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="re-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="re-txt">
                                <p><a title="" href="">七建产品</a></p>
                                <p>店主: 啊啊啊啊啊</p>
                                <p>信誉值: 999999</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="re-img">
                                <a title="" href="">
                                    <img src="../images/200x200.gif">
                                </a>
                            </div>
                            <div class="re-txt">
                                <p><a title="" href="">七建产品</a></p>
                                <p>店主: 啊啊啊啊啊</p>
                                <p>信誉值: 999999</p>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- #2 -->

            </div>
            <!-- 右边 - 右边 -->

        </div>
        <!-- 右边 -->

    </div>

</div>
<!-- #左右框架 -->

<!-- 底部 -->
<div class="container-fluid foot">

    <div class="container">

        <div class="col-xs-12">
            <ul>
                <li><a title="" href="#">首页</a></li>
                <li><a title="" href="">关于我们</a></li>
                <li><a title="" href="">新闻中心</a></li>
                <li><a title="" href="">产品中心</a></li>
                <li><a title="" href="">公司全景</a></li>
                <li><a title="" href="">官方商城</a></li>
                <li><a title="" href="">人力资源</a></li>
                <li><a title="" href="">联系我们</a></li>
            </ul>
        </div>

        <div class="col-xs-12 foot-cont">

            <div class="col-xs-10">

                <p style="font-size: 24px;font-weight: bold;">400-0000 0000</p>
                <p style="font-weight: bold;">欢迎来电咨询</p>
                <p>地址 : 广东省湛江市XXXXXX</p>

            </div>

            <div class="col-xs-2">
                <img class="code" alt="" src="images/code.jpg">
            </div>

        </div>

        <div class="col-xs-12 copy">
            @2018 粤ICP备12345678号
        </div>
    </div>

</div>
<!-- #底部 -->

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>

<script>
    $(function () {

        // 下栏菜单鼠标移动展开隐藏
        $(".dropdown").mouseover(function () {
            $(this).addClass("open");
        });

        $(".dropdown").mouseleave(function () {
            $(this).removeClass("open");
        });
        // #下栏菜单鼠标移动展开隐藏

        // 获取幻灯片指标数量
        var caInd = $('.carousel-indicators li').length;
        // 获取幻灯片图片数量
        var caItem = $('.carousel-inner .item').length;

        // 判断幻灯片指标数量不等于1的情况展示和隐藏幻灯片指标
        if (caInd != 1) {
            $('.carousel-indicators li').eq(0).addClass('active');
        } else {
            $('.carousel-indicators li').remove();
        }

        // 判断幻灯片图片数量不等于1的情况展示和隐藏左右箭头
        if (caItem != 1) {
            $('.carousel-inner .item').eq(0).addClass('active');
        } else {
            $('.carousel-inner .item').eq(0).addClass('active');
            $('a.carousel-control').remove();
        }
    });

    // 导航移动固定头部
    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) {
            $('.navbar-default').addClass('navbar-fixed-top');
        } else {
            $('.navbar-default').removeClass('navbar-fixed-top');
        }
    });
</script>

<?php $this->endBody(); ?>

</body>
</html>

<?php $this->endPage() ?>