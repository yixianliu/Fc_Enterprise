<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use frontend\assets\QijianAsset;
use common\models\Menu;
use common\widgets\iConf\ConfList;

QijianAsset::register($this);

$ClsMenu = new Menu();

$footMenu = Menu::findByAll('E1', 'cn');

$session = Yii::$app->session;

$this->beginPage();
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>

    <?= ConfList::widget(['config' => [$this->title, 'head']]); ?>

    <?php $this->head() ?>

    <script type="text/javascript">
        $(function () {
            funs();
            goTop();
        });
    </script>

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
                    'items'   => $ClsMenu->findMenuNav('E1', Yii::$app->session['language']),
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

<!-- 返回顶部 -->
<div class="button-go-top">
    <a href="#" title="" class="go-top">
        <i class="glyphicon glyphicon-chevron-up"></i>
    </a>
</div>
<!-- #返回顶部 -->

<?php $this->endBody(); ?>

</body>
</html>

<?php $this->endPage() ?>
