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

                <li>
                    <a href="<?= Url::to(['/admin/center/language', 'type' => 'cn']) ?>">中文版</a> /
                </li>

                <li>
                    <a href="<?= Url::to(['/admin/center/language', 'type' => 'en']) ?>">英文版</a> /
                </li>

                <li>
                    <a href="<?= Yii::$app->request->hostInfo ?>" target="_blank">站点首页</a>
                </li>

            </ul>
        </div>
    </div>

</div>
