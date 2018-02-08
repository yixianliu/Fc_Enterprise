<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use frontend\assets\QijianAsset;
use common\models\Menu;
use common\widgets\iConf\ConfList;

QijianAsset::register($this);

$ClsMenu = new Menu();

$footMenu = Menu::findByAll('E1');

$this->beginPage();
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>

    <?= ConfList::widget(['config' => [$this->title, 'head']]); ?>

    <?php $this->head() ?>

</head>

<body>

<?php $this->beginBody() ?>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="pull-left">
            <a class="navbar-brand" title="" href="<?= Url::to(['/']) ?>">
                <?= Html::img(Url::to('@web/themes/qijian/images/logo.jpg'), ['alt' => '']); ?>
            </a>
        </div>

        <div class="pull-right">
            <div id="navbar" class="navbar-collapse collapse">

                <?=
                Nav::widget([
                    'options' => ['class' => 'nav nav-pills'],
                    'items'   => $ClsMenu->findMenuNav('E1'),
                ]);
                ?>

            </div>
        </div>
    </div>
</nav>

<?= $content ?>

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
        if(caInd != 1){
            $('.carousel-indicators li').eq(0).addClass('active');
        } else {
            $('.carousel-indicators li').remove();
        }

        // 判断幻灯片图片数量不等于1的情况展示和隐藏左右箭头
        if(caItem != 1){
            $('.carousel-inner .item').eq(0).addClass('active');
        } else {
            $('.carousel-inner .item').eq(0).addClass('active');
            $('a.carousel-control').remove();
        }
    });

    // 导航移动固定头部
    $(window).scroll(function(){
        if($(this).scrollTop() > 150){
            $('.navbar-default').addClass('navbar-fixed-top');
        } else {
            $('.navbar-default').removeClass('navbar-fixed-top');
        }
    });
</script>

<script type="text/javascript">
    $(function(){

        var index=0,len=$('.tabnav li').length,_timer=null;

        function showTab(index){
            $('.tabnav li').eq(index).addClass('cur').siblings().removeClass('cur');
            $('.tabcon li').eq(index).stop(true,true).slideDown('slow').siblings().slideUp('slow');
        }

        // 自动播放
        // function auto(){
        //     timer=setTimeout(function(){
        //         index=(index+1)%len;
        //         showTab(index);
        //         timer=setTimeout(arguments.callee,3500);
        //     },1000)
        // }
        //
        // auto();

        $('.tabnav li').mouseenter(function(){
            var index = $(this).index();
            showTab(index);
        });

        $('.acttabbox').hover(function(){
            clearTimeout(timer);
        },function(){
            // auto();
            return true;
        });

    });
</script>

<?php $this->endBody(); ?>

</body>
</html>

<?php $this->endPage() ?>
