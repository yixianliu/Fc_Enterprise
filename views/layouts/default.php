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
        <meta name="author" content="SemiColonWeb" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="stylesheet" href="./themes/default/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="./themes/default/style.css" type="text/css" />
        <link rel="stylesheet" href="./themes/default/css/dark.css" type="text/css" />
        <link rel="stylesheet" href="./themes/default/css/font-icons.css" type="text/css" />
        <link rel="stylesheet" href="./themes/default/css/animate.css" type="text/css" />
        <link rel="stylesheet" href="./themes/default/css/magnific-popup.css" type="text/css" />
        <link rel="stylesheet" href="./themes/default/css/responsive.css" type="text/css" />

        <title><?= Html::encode($this->title); ?> - <?= Yii::$app->params['NAME']; ?> - <?= Yii::$app->params['TITLE']; ?></title>

        <style>

            html, body, *, p, h1, h2, h3, h4 {
                font-family: 'Microsoft YaHei';
                letter-spacing: 1px;
            }

        </style>

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