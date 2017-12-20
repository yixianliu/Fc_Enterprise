<?php
/**
 *
 * 用户中心左边栏目
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/12/20
 * Time: 10:14
 */

use yii\helpers\Url;

?>

<form role="form" class="relative">
    <input type="search" class="searchbox" placeholder="搜索从这里开始...">
    <button type="submit" class="search-button"><i class="icon icon_search"></i></button>
</form>

<!-- Categories -->
<div class="widget categories">
    <h3 class="widget-title">用户中心 / User Center</h3>
    <ul>
        <li class="active-cat"><a href="<?= Url::to(['user/index']) ?>">用户中心</a></li>
        <li><a href="#">用户资料</a></li>
        <li><a href="<?= Url::to(['job/index']) ?>">招聘中心</a></li>
        <li><a href="#">采购中心</a></li>
        <li><a href="#">发布招聘</a></li>
        <li><a href="#">修改密码</a></li>
    </ul>
</div>

<div class="widget latest-posts">
    <h3 class="widget-title">Recent Posts</h3>
    <ul>
        <li class="clearfix">
            <a href="blog-single-post.html">
                <img src="<?= Url::to('@web/themes/enterprise/img') ?>/blog/latest_posts_1.jpg" alt="">
                This is standard blog post title
                <div class="entry-meta">
                    <span class="entry-date">July 3, 2015</span>
                </div>
            </a>
        </li>
        <li class="clearfix">
            <a href="blog-single-post.html">
                <img src="<?= Url::to('@web/themes/enterprise/img') ?>/blog/latest_posts_2.jpg" alt="">
                Enigma perfect minimal onepage
                <div class="entry-meta">
                    <span class="entry-date">July 2, 2015</span>
                </div>
            </a>
        </li>
        <li class="clearfix">
            <a href="blog-single-post.html">
                <img src="<?= Url::to('@web/themes/enterprise/img') ?>/blog/latest_posts_3.jpg" alt="">
                Building your business with our themes
                <div class="entry-meta">
                    <span class="entry-date">July 1, 2015</span>
                </div>
            </a>
        </li>
    </ul>
</div>
