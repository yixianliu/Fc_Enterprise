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
use frontend\assets\DefaultAsset;
use common\models\Menu;
use common\widgets\iConf\ConfList;

DefaultAsset::register($this);

$footMenu = Menu::findByAll('E1');

$ConfArray = \common\models\Conf::findByConfArray(Yii::$app->session['language']);

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
                <a class="navbar-brand" title="" href="<?= Url::to(['/']) ?>">
                    <?= Html::img(Url::to('@web/themes/qijian/images/logo.jpg'), ['alt' => $ConfArray['NAME']]); ?>
                </a>
            </div>
            <!-- #LOGO -->

            <!-- 菜单导航 -->
            <div class="col-xs-5">

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav nav-pills">
                        <li><a title="" href="<?= Url::to(['/center/index']) ?>">网站首页</a></li>
                        <li><a title="" href="<?= Url::to(['/purchase/center']) ?>">采购中心</a></li>
                        <li class="dropdown">

                            <a title="" class="dropdown-toggle" data-toggle="" role="button" aria-haspopup="true" aria-expanded="false" href="">
                                用户设置
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a title="" href="<?= Url::to(['user/info']) ?>">用户资料</a></li>
                                <li><a title="" href="<?= Url::to(['user/setpassword']) ?>">修改密码</a></li>
                                <li><a title="" href="<?= Url::to(['member/logout']) ?>">退出账户</a></li>
                            </ul>

                        </li>

                    </ul>
                </div>

            </div>
            <!-- 菜单导航 -->

            <!-- 搜索 -->
            <div class="col-xs-5 search">

                <form name="search" action="<?= Url::to(['/search/product']) ?>" method="get">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                采购信息 <span class="caret"></span>
                            </button>
                        </div>
                        <input type="text" class="form-control" aria-label="请输入您要查询的关键字" placeholder="请输入您要查询的关键字" name="title"/>
                        <span class="input-group-btn"><input type="submit" class="btn btn-red" value="搜索"/></span>
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

            <?= $content ?>

        </div>

    </div>

    <div class="container-fluid foot">

        <div class="container">

            <div class="col-xs-12">
                <ul>
                    <?php foreach ($footMenu as $value): ?>
                        <li><a title="<?= $value['name'] ?>" href="#"><?= $value['name'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?= ConfList::widget(['config' => [$this->title, 'foot']]); ?>

        </div>

    </div>
    <!-- #底部 -->

    <script type="text/javascript">

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