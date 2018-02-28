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
use common\widgets\iConf\ConfList;

?>

<div class="left">

    <div class="user-cont">
        <h3>
            <?= Html::img(Url::to('@web/themes/qijian/images/200x200.gif'), ['alt' => Yii::$app->user->identity->username]); ?>
        </h3>
        <p>用户名 : <?= Yii::$app->user->identity->username ?></p>
        <p>上次登录时间 : <?= date('Y / m / d', Yii::$app->user->identity->updated_at) ?></p>

    </div>

    <?php if (Yii::$app->user->identity->is_type == 'enterprise'): ?>
        <div class="cat_list">
            <h3>企业用户</h3>
            <p><a href="<?= Url::to(['job/index']) ?>">招聘中心</a></p>
        </div>
    <?php endif ?>

    <?php if (Yii::$app->user->identity->is_type == 'supplier'): ?>
        <div class="cat_list">
            <h3>商户中心</h3>
            <p><a href="<?= Url::to(['purchase/index']) ?>">采购中心</a></p>
            <p><a href="<?= Url::to(['purchase/create']) ?>">发布采购</a></p>
            <p><a href="<?= Url::to(['sp-offer/index']) ?>">提交价格的产品</a></p>
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

        <?= ConfList::widget(['config' => [$this->title, 'left']]); ?>

    </div>

</div>