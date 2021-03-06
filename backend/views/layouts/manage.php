<?php

use yii\helpers\Url;
use yii\helpers\Html;
use backend\assets\AppAsset;
use common\widgets\iConf\ConfList;

// $this 代表视图对象
AppAsset::register($this);

if (!file_exists(Yii::getAlias('@webroot') . '/' . Yii::$app->params['RD_FILE']) || Yii::$app->user->isGuest) {
    return false;
}

$this->beginPage();

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>

    <?= ConfList::widget(['config' => [$this->title, 'head']]); ?>

    <?php $this->head() ?>

</head>
<body class=" ">

<?php $this->beginBody() ?>

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

                    <ul class="dropdown-menu profile animated fadeIn">
                        <li><a href="<?= Url::to(['/manage/center/conf']) ?>"><i class="fa fa-wrench"></i>站点设置</a></li>
                        <li class="last"><a href="<?= Url::to(['/manage/member/logout']) ?>"><i class="fa fa-lock"></i>注销用户</a></li>
                    </ul>

            </ul>
        </div>
    </div>

</div>

<div class="page-container row-fluid">
    <div class="page-sidebar ">
        <div class="page-sidebar-wrapper" id="main-menu-wrapper">
            <div class="profile-info row">

                <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                    <a href="#">
                        <?= Html::img(Url::to('@web/themes/data/profile/user.jpg'), ['class' => 'img-responsive img-circle']); ?>
                    </a>
                </div>

                <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                    <h3>
                        <a href="#"><?= Yii::$app->user->identity->username; ?></a>
                        <span class="profile-status online"><?= Yii::$app->user->identity->item_name; ?></span>
                    </h3>

                    <p class="profile-title"><?= Yii::$app->request->userIP; ?></p>

                </div>

            </div>

            <?= \common\widgets\iMenu\MenuAdmin::widget(['config' => ['Super1']]) ?>

        </div>
    </div>

    <section id="main-content" class=" ">
        <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>

            <?= $content ?>

        </section>
    </section>

</div>

<?php $this->endBody(); ?>

</body>
</html>

<?php $this->endPage() ?>
