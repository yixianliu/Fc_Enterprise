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

use yii\helpers\Html;
use yii\helpers\Url;

// 侧边栏的官方内容
$result['Conf'] = \frontend\controllers\BaseController::WebConf();

?>

<div class="left">

    <div class="user-left-cont">
        <h3><a title="" href="user-confhead.html"><img alt="" class="image_fade" src="../images/200x200.gif"></a></h3>
        <p><?= Yii::$app->user->identity->username ?></p>
        <p>上次登录时间 : <?= date('Y / m / d', Yii::$app->user->identity->updated_at) ?></p>
    </div>

    <div class="user-left-list">
        <ul class="nav navbar-nav">

            <?php if (Yii::$app->user->identity->is_type == 'supplier'): ?>

            <li class="dropdown open">

                <a href="#" class="dropdown-toggle">采购管理 <span class="caret"></span></a>

                <ul class="dropdown-menu">
                    <li><a href="user-purchase-eidt.html">发布采购</a></li>
                    <li><a href="user-purchase-view.html">采购中心</a></li>
                </ul>

            </li>

            <?php else: ?>

            <li class="dropdown open">
                <a href="#" class="dropdown-toggle">
                    产品管理 <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li><a href="user-product-edit.html">发布产品</a></li>
                    <li><a href="user-product-view.html">产品中心</a></li>
                </ul>
            </li>

            <?php endif ?>

            <li class="dropdown open">
                <a href="#" class="dropdown-toggle">
                    招聘管理 <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li><a href="user-job-view.html">招聘中心</a></li>
                    <li><a href="user-resume-view.html">我的简历</a></li>
                </ul>
            </li>

        </ul>
    </div>

    <div class="user-left-contact">

        <img alt="" src="../images/contact.jpg"/>

        <ul class="user-left-contactUs">
            <li><a><?= Yii::t('app', 'company') ?> ：<?= $result['Conf']['NAME'] ?></a></li>
            <li><a><?= Yii::t('app', 'contacts') ?> ：<?= $result['Conf']['PERSON'] ?></a></li>
            <li><a><?= Yii::t('app', 'phone') ?> ：<span><?= $result['Conf']['PHONE'] ?></span></a></li>
            <li><a><?= Yii::t('app', 'address') ?> ：<span><?= $result['Conf']['ADDRESS'] ?></span></a></li>
        </ul>
    </div>

</div>

<div class="left">

    <div class="user-cont">

        <br/>

        <p>用户名 : <?= Yii::$app->user->identity->username ?></p>
        <p>上次登录时间 : <?= date('Y / m / d', Yii::$app->user->identity->updated_at) ?></p>

    </div>

    <?php if (Yii::$app->user->identity->is_type == 'supplier'): ?>

        <div class="cat_list">
            <h3>商户中心</h3>
            <p><a href="<?= Url::to(['user/supplier']) ?>">商户资料</a></p>
            <p><a href="<?= Url::to(['purchase/index']) ?>">采购中心</a></p>
            <p><a href="<?= Url::to(['sp-offer/index']) ?>">提交价格的产品</a></p>
        </div>

    <?php else: ?>

        <div class="cat_list">
            <h3>普通用户</h3>
            <p><a href="<?= Url::to(['job/index']) ?>">招聘中心</a></p>
            <p><a href="<?= Url::to(['job/update', 'id' => Yii::$app->user->identity->user_id]) ?>">我的简历</a></p>
        </div>

    <?php endif ?>

    <div class="cat_list">
        <h3>用户中心</h3>
        <p><a href="<?= Url::to(['user/index']) ?>">用户中心</a></p>
        <p><a href="<?= Url::to(['user/info']) ?>">用户资料</a></p>
        <p><a href="<?= Url::to(['user/setpassword']) ?>">修改密码</a></p>
        <p><a href="<?= Url::to(['member/logout']) ?>">退出账户</a></p>
    </div>

    <div class="contact">

        <?= Html::img(Url::to('@web/themes/qijian/images/contact.jpg'), ['alt' => $this->title]); ?>

        <ul class="contact_us">
            <li><a><?= Yii::t('app', 'company') ?> ：<?= $result['Conf']['NAME'] ?></a></li>
            <li><a><?= Yii::t('app', 'contacts') ?> ：<?= $result['Conf']['PERSON'] ?></a></li>
            <li><a><?= Yii::t('app', 'phone') ?> ：<span><?= $result['Conf']['PHONE'] ?></span></a></li>
            <li><a><?= Yii::t('app', 'address') ?> ：<span><?= $result['Conf']['ADDRESS'] ?></span></a></li>
        </ul>

    </div>

</div>