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

        <!-- Document Title
        ============================================= -->
        <title>Canvas | The Multi-Purpose HTML5 Template</title>

        <style>

            html, body, *, p {
                font-family: 'Microsoft YaHei';
                letter-spacing: 1px;
            }

        </style>

    </head>

    <body class="stretched">
        <div id="wrapper" class="clearfix">

            <?= $this->render('../default/menu'); ?>

            <!-- Page Title
                ============================================= -->
            <section id="page-title" class="page-title-mini">

                <div class="container clearfix">
                    <h1>About Us</h1>
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

            <!-- Footer
            ============================================= -->
            <footer id="footer" class="dark">

                <!-- Copyrights
                ============================================= -->
                <div id="copyrights">

                    <div class="container center clearfix">

                        Copyrights &copy; 2016 All Rights Reserved by SemiColonWeb<br>
                        <div class="copyright-links"><a href="http://themeforest.net/user/semicolonweb/portfolio?ref=SemiColonWeb" target="_blank">Portfolio</a> / <a href="http://support.semicolonweb.com" target="_blank">Support</a></div>

                    </div>

                </div><!-- #copyrights end -->

            </footer><!-- #footer end -->

        </div><!-- #wrapper end -->

        <!-- Go To Top
        ============================================= -->
        <div id="gotoTop" class="icon-angle-up"></div>

        <!-- External JavaScripts
        ============================================= -->
        <script type="text/javascript" src="./themes/default/js/jquery.js"></script>
        <script type="text/javascript" src="./themes/default/js/plugins.js"></script>

        <!-- Footer Scripts
        ============================================= -->
        <script type="text/javascript" src="./themes/default/js/functions.js"></script>

    </body>
</html>