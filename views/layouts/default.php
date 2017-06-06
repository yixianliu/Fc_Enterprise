<?php

/**
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta content="description" name="<?= Yii::$app->params['DESCRIPTION']; ?>"/>
        <meta content="author" name="<?= Yii::$app->params['COPYRIGHT']; ?>"/>

        <link rel="shortcut icon" href="<?= Yii::getAlias("@web") ?>/web/favicon.ico" type="image/x-icon"/>
        <!-- Favicon -->

        <link rel="apple-touch-icon-precomposed"
              href="<?= Yii::getAlias("@web") ?>/themes/backend/assets/images/apple-touch-icon-57-precomposed.png">
        <!-- For iPhone -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114"
              href="<?= Yii::getAlias("@web") ?>/themes/backend/assets/images/apple-touch-icon-114-precomposed.png">
        <!-- For iPhone 4 Retina display -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72"
              href="<?= Yii::getAlias("@web") ?>/themes/backend/assets/images/apple-touch-icon-72-precomposed.png">
        <!-- For iPad -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144"
              href="<?= Yii::getAlias("@web") ?>/themes/backend/assets/images/apple-touch-icon-144-precomposed.png">
        <!-- For iPad Retina display -->0

        <?= Html::cssFile('@web/themes/default/css/bootstrap.css') ?>
        <?= Html::cssFile('@web/themes/default/style.css') ?>
        <?= Html::cssFile('@web/themes/default/css/dark.css') ?>
        <?= Html::cssFile('@web/themes/default/css/font-icons.css') ?>
        <?= Html::cssFile('@web/themes/default/css/animate.css') ?>
        <?= Html::cssFile('@web/themes/default/css/magnific-popup.css') ?>
        <?= Html::cssFile('@web/themes/default/css/responsive.css') ?>

        <title><?= Html::encode($this->title); ?> - <?= Yii::$app->params['NAME']; ?> - <?= Yii::$app->params['TITLE']; ?></title>

        <style>

            html, body, *, p, h1, h2, h3, h4 {
                font-family: 'Microsoft YaHei';
                letter-spacing: 1px;
            }

        </style>

        <?= Html::jsFile('@web/themes/jquery.js') ?>

    </head>

    <body class="stretched">
        <div id="wrapper" class="clearfix">

            <?= $this->render('../default/menu'); ?>

            <section id="page-title" class="page-title-mini">

                <div class="container clearfix">
                    <h1><?= Html::encode($this->title); ?></h1>
                    <span>Everything you need to know about our Company</span>
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

                        Copyrights &copy; 2016 All Rights Reserved by <?= Yii::$app->params['NAME']; ?><br>

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

    </body>
</html>