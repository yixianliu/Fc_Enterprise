<?php
/**
 *
 * 站内信息模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/10/27
 * Time: 15:46
 */

use yii\helpers\Url;
use yii\helpers\Html;

?>

<div class='page-topbar '>

    <div class='logo-area'></div>

    <div class='quick-area'>
        <div class='pull-left'>
            <ul class="info-menu left-links list-inline list-unstyled">
                <li class="sidebar-toggle-wrap">
                    <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                <li class="">
                    <a href="#" data-toggle="dropdown" class="toggle">
                        <i class="fa fa-envelope"></i>
                        <span class="badge badge-primary">7</span>
                    </a>
                    <ul class="dropdown-menu messages animated fadeIn">

                        <li class="list">

                            <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                <li class="unread status-available">
                                    <a href="javascript:">
                                        <div class="user-img">
                                            <?= Html::img(Url::to('@web/themes/data/profile/profile.png'), ['class' => 'img-circle img-inline']); ?>
                                        </div>
                                        <div>
                                                    <span class="name">
                                                        <strong>Clarine Vassar</strong>
                                                        <span class="time small">- 15 mins ago</span>
                                                        <span class="profile-status available pull-right"></span>
                                                    </span>
                                            <span class="desc small">
                                                        Sometimes it takes a lifetime to win a battle.
                                                    </span>
                                        </div>
                                    </a>
                                </li>
                                <li class=" status-away">
                                    <a href="javascript:">
                                        <div class="user-img">
                                            <?= Html::img(Url::to('@web/themes/data/profile/avatar-2.png'), ['class' => 'img-circle img-inline']); ?>
                                        </div>
                                        <div>
                                                    <span class="name">
                                                        <strong>Brooks Latshaw</strong>
                                                        <span class="time small">- 45 mins ago</span>
                                                        <span class="profile-status away pull-right"></span>
                                                    </span>
                                            <span class="desc small">
                                                        Sometimes it takes a lifetime to win a battle.
                                                    </span>
                                        </div>
                                    </a>
                                </li>
                                <li class=" status-busy">
                                    <a href="javascript:">
                                        <div class="user-img">
                                            <?= Html::img(Url::to('@web/themes/data/profile/avatar-3.png'), ['class' => 'img-circle img-inline']); ?>
                                        </div>
                                        <div>
                                                    <span class="name">
                                                        <strong>Clementina Brodeur</strong>
                                                        <span class="time small">- 1 hour ago</span>
                                                        <span class="profile-status busy pull-right"></span>
                                                    </span>
                                            <span class="desc small">
                                                        Sometimes it takes a lifetime to win a battle.
                                                    </span>
                                        </div>
                                    </a>
                                </li>
                                <li class=" status-offline">
                                    <a href="javascript:">
                                        <div class="user-img">
                                            <?= Html::img(Url::to('@web/themes/data/profile/avatar-4.png'), ['class' => 'img-circle img-inline']); ?>
                                        </div>
                                        <div>
                                                    <span class="name">
                                                        <strong>Carri Busey</strong>
                                                        <span class="time small">- 5 hours ago</span>
                                                        <span class="profile-status offline pull-right"></span>
                                                    </span>
                                            <span class="desc small">
                                                        Sometimes it takes a lifetime to win a battle.
                                                    </span>
                                        </div>
                                    </a>
                                </li>
                                <li class=" status-offline">
                                    <a href="javascript:">
                                        <div class="user-img">
                                            <?= Html::img(Url::to('@web/themes/data/profile/avatar-5.png'), ['class' => 'img-circle img-inline']); ?>
                                        </div>
                                        <div>
                                                    <span class="name">
                                                        <strong>Melissa Dock</strong>
                                                        <span class="time small">- Yesterday</span>
                                                        <span class="profile-status offline pull-right"></span>
                                                    </span>
                                            <span class="desc small">
                                                        Sometimes it takes a lifetime to win a battle.
                                                    </span>
                                        </div>
                                    </a>
                                </li>
                                <li class=" status-available">
                                    <a href="javascript:">
                                        <div class="user-img">
                                            <?= Html::img(Url::to('@web/themes/data/profile/avatar-1.png'), ['class' => 'img-circle img-inline']); ?>
                                        </div>
                                        <div>
                                                    <span class="name">
                                                        <strong>Verdell Rea</strong>
                                                        <span class="time small">- 14th Mar</span>
                                                        <span class="profile-status available pull-right"></span>
                                                    </span>
                                            <span class="desc small">
                                                        Sometimes it takes a lifetime to win a battle.
                                                    </span>
                                        </div>
                                    </a>
                                </li>
                                <li class=" status-busy">
                                    <a href="javascript:">
                                        <div class="user-img">
                                            <?= Html::img(Url::to('@web/themes/data/profile/avatar-2.png'), ['class' => 'img-circle img-inline']); ?>
                                        </div>
                                        <div>
                                                    <span class="name">
                                                        <strong>Linette Lheureux</strong>
                                                        <span class="time small">- 16th Mar</span>
                                                        <span class="profile-status busy pull-right"></span>
                                                    </span>
                                            <span class="desc small">
                                                        Sometimes it takes a lifetime to win a battle.
                                                    </span>
                                        </div>
                                    </a>
                                </li>
                                <li class=" status-away">
                                    <a href="javascript:">
                                        <div class="user-img">
                                            <?= Html::img(Url::to('@web/themes/data/profile/avatar-3.png'), ['class' => 'img-circle img-inline']); ?>
                                        </div>
                                        <div>
                                                    <span class="name">
                                                        <strong>Araceli Boatright</strong>
                                                        <span class="time small">- 16th Mar</span>
                                                        <span class="profile-status away pull-right"></span>
                                                    </span>
                                            <span class="desc small">
                                                        Sometimes it takes a lifetime to win a battle.
                                                    </span>
                                        </div>
                                    </a>
                                </li>

                            </ul>

                        </li>

                        <li class="external">
                            <a href="javascript:">
                                <span>Read All Messages</span>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="">
                    <a href="#" data-toggle="dropdown" class="toggle">
                        <i class="fa fa-bell"></i>
                        <span class="badge badge-orange">3</span>
                    </a>
                    <ul class="dropdown-menu notifications animated fadeIn">
                        <li class="total">
                                    <span class="small">
                                        You have <strong>3</strong> new notifications.
                                        <a href="javascript:" class="pull-right">Mark all as Read</a>
                                    </span>
                        </li>
                        <li class="list">

                            <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                <li class="unread available"> <!-- available: success, warning, info, error -->
                                    <a href="javascript:">
                                        <div class="notice-icon">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <div>
                                                    <span class="name">
                                                        <strong>Server needs to reboot</strong>
                                                        <span class="time small">15 mins ago</span>
                                                    </span>
                                        </div>
                                    </a>
                                </li>
                                <li class="unread away"> <!-- available: success, warning, info, error -->
                                    <a href="javascript:">
                                        <div class="notice-icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div>
                                                    <span class="name">
                                                        <strong>45 new messages</strong>
                                                        <span class="time small">45 mins ago</span>
                                                    </span>
                                        </div>
                                    </a>
                                </li>
                                <li class=" busy"> <!-- available: success, warning, info, error -->
                                    <a href="javascript:">
                                        <div class="notice-icon">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <div>
                                                    <span class="name">
                                                        <strong>Server IP Blocked</strong>
                                                        <span class="time small">1 hour ago</span>
                                                    </span>
                                        </div>
                                    </a>
                                </li>
                                <li class=" offline"> <!-- available: success, warning, info, error -->
                                    <a href="javascript:">
                                        <div class="notice-icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div>
                                                    <span class="name">
                                                        <strong>10 Orders Shipped</strong>
                                                        <span class="time small">5 hours ago</span>
                                                    </span>
                                        </div>
                                    </a>
                                </li>
                                <li class=" offline"> <!-- available: success, warning, info, error -->
                                    <a href="javascript:">
                                        <div class="notice-icon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div>
                                                    <span class="name">
                                                        <strong>New Comment on blog</strong>
                                                        <span class="time small">Yesterday</span>
                                                    </span>
                                        </div>
                                    </a>
                                </li>
                                <li class=" available"> <!-- available: success, warning, info, error -->
                                    <a href="javascript:">
                                        <div class="notice-icon">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <div>
                                                    <span class="name">
                                                        <strong>Great Speed Notify</strong>
                                                        <span class="time small">14th Mar</span>
                                                    </span>
                                        </div>
                                    </a>
                                </li>
                                <li class=" busy"> <!-- available: success, warning, info, error -->
                                    <a href="javascript:">
                                        <div class="notice-icon">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <div>
                                                    <span class="name">
                                                        <strong>Team Meeting at 6PM</strong>
                                                        <span class="time small">16th Mar</span>
                                                    </span>
                                        </div>
                                    </a>
                                </li>

                            </ul>

                        </li>

                        <li class="external">
                            <a href="javascript:">
                                <span>Read All Notifications</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="hidden-sm hidden-xs searchform">
                    <div class="input-group">
                        <span class="input-group-addon input-focus"></i></span>
                        <form action="search-page.html" method="post">
                            <input type="text" class="form-control animated fadeIn" placeholder="Search & Enter">
                            <input type='submit' value="">
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <div class='pull-right'>
            <ul class="info-menu right-links list-inline list-unstyled">
                <li class="profile">

                    <a href="#" data-toggle="dropdown" class="toggle">
                        <?= Html::img(Url::to('@web/themes/data/profile/profile.png'), ['class' => 'img-circle img-inline']); ?>
                        <span><i class="fa fa-angle-down"></i></span>
                    </a>

                    <ul class="dropdown-menu profile animated fadeIn">
                        <li>
                            <a href="#settings">
                                <i class="fa fa-wrench"></i>
                                站点设置
                            </a>
                        </li>
                        <li>
                            <a href="#profile">
                                <i class="fa fa-user"></i>
                                站点档案
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/admin/faq/index']) ?>">
                                <i class="fa fa-info"></i>
                                站点帮助
                            </a>
                        </li>
                        <li class="last">
                            <a href="<?= Url::to(['/admin/member/logout']) ?>">
                                <i class="fa fa-lock"></i>
                                注销用户
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="chat-toggle-wrapper">
                    <a href="#" data-toggle="chatbar" class="toggle_chat">
                        <i class="fa fa-comments"></i>
                        <span class="badge badge-warning">1</span>
                    </a>
                </li>

                <li class="chat-toggle-wrapper">
                    <a href="#" data-toggle="chatbar" class="toggle_chat">
                        <i class="fa fa-comments"></i>
                        <span class="badge badge-warning">1</span>
                    </a>
                </li>

                <li>
                    <a href="<?= Yii::$app->request->hostInfo . '/FcCalendar/frontend/web/index.php' ?>" target="_blank"><span class="badge badge-warning">站点首页</span></a>
                </li>

            </ul>
        </div>
    </div>

</div>
