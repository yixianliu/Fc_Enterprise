<?php

/**
 * 默认布局模板
 */

use yii\helpers\Html;

$this->title = '用户登录';
?>

<?php $this->beginPage() ?>

    <!DOCTYPE html>
    <html dir="ltr" lang="en-US">
    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta content="description" name="<?= Yii::$app->params['DESCRIPTION']; ?>"/>
        <meta content="author" name="<?= Yii::$app->params['COPYRIGHT']; ?>"/>

        <link rel="shortcut icon" href="<?= Yii::getAlias("@web") ?>/favicon.ico" type="image/x-icon"/>

        <?= Html::cssFile('@web/themes/default/css/bootstrap.css') ?>
        <?= Html::cssFile('@web/themes/default/style.css') ?>
        <?= Html::cssFile('@web/themes/default/css/dark.css') ?>
        <?= Html::cssFile('@web/themes/default/css/font-icons.css') ?>
        <?= Html::cssFile('@web/themes/default/css/animate.css') ?>
        <?= Html::cssFile('@web/themes/default/css/magnific-popup.css') ?>
        <?= Html::cssFile('@web/themes/default/css/responsive.css') ?>

        <title><?= Html::encode($this->title); ?> - <?= Yii::$app->params['NAME']; ?> - <?= Yii::$app->params['TITLE']; ?></title>

        <style>
            *, html, body, label, a {
                font-family: "Microsoft YaHei", "微软雅黑", "Arial";
                letter-spacing: 1px;
                font-weight: 400;
            }
        </style>

        <?= Html::jsFile('@web/themes/jquery.js') ?>

    </head>

    <body class="stretched">

    <?php $this->beginBody() ?>

    <div id="wrapper" class="clearfix">

        <?= $this->render('../default/menu'); ?>

        <section id="page-title" class="page-title-mini">

            <div class="container clearfix">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">About Us</li>
                </ol>
            </div>

        </section>

        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">

                    <?= $content; ?>

                </div>
            </div>
        </section>

        <footer id="footer" class="dark">
            <div id="copyrights">

                <div class="container center clearfix">

                    Copyrights &copy; 2016 All Rights Reserved
                    by <?= Yii::$app->params['NAME']; ?><br>

                    <div class="copyright-links">
                        <a href="#" target="_blank">Portfolio</a> /
                        <a href="#" target="_blank">Support</a>
                    </div>

                </div>

            </div>
        </footer>

    </div>

    <div id="gotoTop" class="icon-angle-up"></div>

    <script type="text/javascript" src="./themes/default/js/jquery.js"></script>
    <script type="text/javascript" src="./themes/default/js/plugins.js"></script>
    <script type="text/javascript" src="./themes/default/js/functions.js"></script>

    <?php $this->endBody() ?>

    </body>
    </html>

<?php $this->endPage() ?>