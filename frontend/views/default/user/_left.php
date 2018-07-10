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
use yii\helpers\Html;

// 侧边栏的官方内容
$result['Conf'] = \common\models\Conf::findByConfArray(Yii::$app->session['language']);

?>

<div class="left">

    <div class="user-left-cont">
        <h3><a title="<?= Yii::$app->user->identity->username ?>" href="<?= Url::to(['/']) ?>"><?= Html::img(Url::to('@web/themes/qijian/images/200x200.gif'), ['class' => '', 'alt' => $result['Conf']['NAME']]); ?></a></h3>

        <p><?= Yii::$app->user->identity->username ?></p>
        <p>上次登录时间 : <?= date('Y.m.d', Yii::$app->user->identity->updated_at) ?></p>

    </div>

    <div class="user-left-list">
        <ul class="nav navbar-nav">

            <?php if (Yii::$app->user->identity->is_type == 'supplier'): ?>

                <li class="dropdown open">

                    <a href="#" class="dropdown-toggle">采购管理 <span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <li><?= Html::a('提交价格', ['/sp-offer/index'], ['title' => $result['Conf']['NAME']]) ?></li>
                        <li><?= Html::a('采购中心', ['/purchase/index'], ['title' => $result['Conf']['NAME']]) ?></li>
                        <li><?= Html::a('商户资料', ['/user/supplier'], ['title' => $result['Conf']['NAME']]) ?></li>
                    </ul>

                </li>

            <?php else: ?>

                <li class="dropdown open">

                    <a href="#" class="dropdown-toggle">产品管理 <span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <li><?= Html::a('提交价格', ['user/index'], ['title' => $result['Conf']['NAME']]) ?></li>
                        <li><?= Html::a('招聘中心', ['job/index'], ['title' => $result['Conf']['NAME']]) ?></li>
                        <li><?= Html::a('招聘中心', ['job/update', 'id' => Yii::$app->user->identity->user_id], ['title' => $result['Conf']['NAME']]) ?></li>
                    </ul>
                </li>

            <?php endif ?>

            <li class="dropdown open">
                <a href="#" class="dropdown-toggle">用户中心 <span class="caret"></span></a>

                <ul class="dropdown-menu">
                    <li><?= Html::a('用户中心', ['user/index'], ['title' => $result['Conf']['NAME']]) ?></li>
                    <li><?= Html::a('用户资料', ['user/info'], ['title' => $result['Conf']['NAME']]) ?></li>
                    <li><?= Html::a('修改密码', ['user/setpassword'], ['title' => $result['Conf']['NAME']]) ?></li>
                    <li><?= Html::a('退出账户', ['member/logout'], ['title' => $result['Conf']['NAME']]) ?></li>

                </ul>
            </li>

        </ul>
    </div>

    <div class="user-left-contact">

        <?= Html::img(Url::to('@web/themes/qijian/images/contact.jpg'), ['alt' => $this->title]); ?>

        <ul class="user-left-contactUs">
            <li><a><?= Yii::t('app', 'company') ?> ：<?= $result['Conf']['NAME'] ?></a></li>
            <li><a><?= Yii::t('app', 'contacts') ?> ：<?= $result['Conf']['PERSON'] ?></a></li>
            <li><a><?= Yii::t('app', 'phone') ?> ：<span><?= $result['Conf']['PHONE'] ?></span></a></li>
            <li><a><?= Yii::t('app', 'address') ?> ：<span><?= $result['Conf']['ADDRESS'] ?></span></a></li>
        </ul>
    </div>

</div>