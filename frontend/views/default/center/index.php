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
                    <a title="" href="">
                        <?= Html::img(Url::to('@web/themes/qijian/images/ser-left-1.jpg'), ['alt' => '']); ?>
                    </a>
                </div>

                <div>
                    <a title="" href="">
                        <?= Html::img(Url::to('@web/themes/qijian/images/ser-left-2.jpg'), ['alt' => '']); ?>
                    </a>
                </div>

            </div>

            <div class="right">

                <div class="ser-right-title">
                    <a title="" href="">
                        <?= Html::img(Url::to('@web/themes/qijian/images/ser-right-1.jpg'), ['alt' => '']); ?>
                    </a>
                </div>

                <div class="ser-right-cont">

                    <div class="ser-right-left">

                        <div>
                            <a title="" href="">
                                <?= Html::img(Url::to('@web/themes/qijian/images/ser-right-2.jpg'), ['alt' => '']); ?>
                            </a>
                        </div>

                        <div>
                            <a title="" href="">
                                <?= Html::img(Url::to('@web/themes/qijian/images/ser-right-3.jpg'), ['alt' => '']); ?>
                            </a>
                        </div>

                    </div>

                    <div class="ser-right-right">

                        <div>
                            <a title="" href="">
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
                        <img width="702" height="300" src="images/T1MdL7Xg4cXXak1cjj-702-300.jpg" alt="活埋" />
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <img width="702" height="300" src="images/T1STrHXlVqXXak1cjj-702-300.jpg" alt="复仇者联盟" />
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <img width="702" height="300" src="images/T1MdL7Xg4cXXak1cjj-702-300.jpg" alt="活埋" />
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <img width="702" height="300" src="images/T1STrHXlVqXXak1cjj-702-300.jpg" alt="复仇者联盟" />
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <img width="702" height="300" src="images/T1MdL7Xg4cXXak1cjj-702-300.jpg" alt="活埋" />
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <img width="702" height="300" src="images/T1STrHXlVqXXak1cjj-702-300.jpg" alt="复仇者联盟" />
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <img width="702" height="300" src="images/T1STrHXlVqXXak1cjj-702-300.jpg" alt="复仇者联盟" />
                    </a>
                </li>
            </ul>

            <ul class="tabnav">
                <li class="cur">
                    <a href="" target="_blank">
                        <span class="pro-icon"></span>碧桂园项目
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <span class="pro-icon"></span>碧桂园项目
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <span class="pro-icon"></span>碧桂园项目
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <span class="pro-icon"></span>桂园项目
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <span class="pro-icon"></span>碧桂园项目
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <span class="pro-icon"></span>碧桂园项目
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <span class="pro-icon"></span>碧桂园项目
                    </a>
                </li>

                <li>
                    <a href="" target="_blank">
                        <span class="pro-icon"></span>碧桂园项目
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
            <ul>
                <li>
                    <div class="news-left">
                        <a title="" href="">
                            <?= Html::img(Url::to('@web/themes/qijian/images/news-1.jpg'), ['alt' => '']); ?>
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
                            <img alt="" src="images/news-2.jpg"/>
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
                            <img alt="" src="images/news-3.jpg"/>
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
                            <img alt="" src="images/news-4.jpg"/>
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
<!-- #新闻 -->

<!-- 精彩 -->
<div class="container-fluid h-job">
    <div class="container">
        <div class="starter-template">
            <h1 class="text-center text-color"><span style="color: #cf0d15;font-weight: bold;">建筑辅材</span> 采购招标火热招募中</h1>
            <h5 class="text-center text-color">追求绿色环保、完美空间创造的精神</h5>
            <h5 class="text-center"><a class="hjob-btn" title="" href="">立即前往 >></a></h5>
        </div>
    </div>
</div>
<!-- #精彩 -->

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
