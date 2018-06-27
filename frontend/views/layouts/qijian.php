<?php

use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\QijianAsset;
use common\widgets\iConf\ConfList;

QijianAsset::register($this);

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
            <a class="navbar-brand" title="" href="<?= Url::to(['center/index']) ?>">
                <?= Html::img(Url::to('@web/themes/qijian/images/logo.jpg'), ['alt' => '']); ?>
            </a>
        </div>

        <div class="pull-right">

            <?= \common\widgets\iMenu\MenuList::widget(['config' => ['E1', Yii::$app->session['language']]]) ?>

        </div>

    </div>
</nav>

<?= $content ?>

<?= ConfList::widget(['config' => [$this->title, 'foot']]); ?>

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
