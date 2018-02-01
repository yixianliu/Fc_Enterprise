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
use common\widgets\iConf\ConfList;

?>

<div class="widget categories">
    <ul>
        <li><?= Yii::$app->user->identity->username ?></li>
        <li class="active-cat"><a href="<?= Url::to(['user/index']) ?>">用户中心</a></li>
        <li><a href="<?= Url::to(['user/info']) ?>">用户资料</a></li>

        <?php if (Yii::$app->user->identity->is_type == 'enterprise'): ?>
            <li><a href="<?= Url::to(['job/index']) ?>">招聘中心</a></li>
        <?php endif ?>

        <?php if (Yii::$app->user->identity->is_type == 'supplier'): ?>
            <li><a href="<?= Url::to(['purchase/index']) ?>">采购中心</a></li>
            <li><a href="<?= Url::to(['supply/index']) ?>">供应中心</a></li>
            <li><a href="<?= Url::to(['sp-offer/index']) ?>">提交价格的产品</a></li>
        <?php endif ?>

        <li><a href="<?= Url::to(['user/setpassword']) ?>">修改密码</a></li>
        <li><a href="<?= Url::to(['member/logout']) ?>">退出账户</a></li>
    </ul>
</div>

<br/>
<h3 class="widget-title">联系我们</h3>

<div class="widget categories">
    <?= ConfList::widget(['config' => [$this->title, 'left']]); ?>
</div>

