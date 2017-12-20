<?php
/**
 *
 * 前台布局模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/10/13
 * Time: 9:44
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\iConf\ConfList;
use common\models\Menu;

AppAsset::register($this); // $this 代表视图对象

$data = Menu::findAll(['is_using' => 'On', 'parent_id' => 'H1']);

foreach ($data as $value) {

    $dataMenu[] = [
        'label' => $value['name'],
        'url'   => [$value['url']],
        'items' => recursionMenu($value),
    ];

}


/**
 * 递归菜单
 *
 * @param $data
 * @return array|void
 */
function recursionMenu($data)
{

    if (empty($data) || empty($data['m_key'])) {
        return;
    }

    $child = Menu::findAll(['is_using' => 'On', 'parent_id' => $data['m_key']]);

    if (empty($child)) {
        return;
    }

    // 初始化
    $result = array();

    foreach ($child as $value) {
        $result[] = [
            'label' => $value['name'],
            'url'   => [$value['url']],
            'items' => recursionMenu($value),
        ];
    }

    return $result;
}

$this->beginPage();

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title><?= Html::encode($this->title) ?></title>

    <?= ConfList::widget(); ?>

    <link rel="shortcut icon" href="<?= Url::to('@web/themes/enterprise/img') ?>/favicon.ico">
    <link rel="apple-touch-icon" href="<?= Url::to('@web/themes/enterprise/img') ?>/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= Url::to('@web/themes/enterprise/img') ?>/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= Url::to('@web/themes/enterprise/img') ?>/apple-touch-icon-114x114.png">

    <?php $this->head() ?>

    <style type="text/css">
        *, body, html, a, input,.btn, h5, p {
            font-family: 'Microsoft YaHei';
            letter-spacing: 1px;
        }
    </style>

</head>

<body>

<?php $this->beginBody() ?>

<div class="loader-mask">
    <div class="loader">
        "Loading..."
    </div>
</div>

<header class="nav-type-2">
    <nav class="navbar navbar-static-top">
        <div class="navigation">
            <div class="container relative">
                <div class="row">
                    <div class="navbar-header">

                        <!-- Logo -->
                        <div class="logo-container">
                            <div class="logo-wrap">
                                <a href="index-mp.html">
                                    <?= Html::img(Url::to('@web/themes/enterprise/img/logo_dark.png'), ['alt' => '', 'class' => 'logo']); ?>
                                </a>
                            </div>
                        </div>

                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div> <!-- end navbar-header -->

                    <div class="col-md-9 nav-wrap right">
                        <div class="collapse navbar-collapse" id="navbar-collapse">

                            <?=
                            Nav::widget([
                                'options' => ['class' => 'navbar-nav navbar-right'],
                                'items'   => $dataMenu,
                            ]);
                            ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>
</header>

<div class="main-wrapper-mp oh">

    <?= $content ?>

    <footer class="footer footer-type-2 bg-dark">
        <div class="container">
            <div class="footer-widgets">
                <div class="row">

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="widget footer-about-us">
                            <h5>About Us</h5>
                            <p class="mb-0">Enigma is a very slick and clean multi-purpose template with endless possibilities. Creating an awesome website with this Theme is easy
                                than you can imagine. Our Theme is a very slick and clean template with endless possibilities.</p>
                        </div>
                    </div>
                    <!-- end about us -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="widget footer-get-in-touch">
                            <h5>Get in Touch</h5>
                            <p class="footer-address">Philippines, Enigma inc.<br> Talay st. 65, PO Box 6200 </p>
                            <p>Phone: + 1 888 1554 456 123</p>
                            <p>Email: <a href="mailto:Enigmasupport@gmail.com">enigmasupport@gmail.com</a></p>
                            <p>Fax: +63 918 4084 694</p>
                        </div>
                    </div> <!-- end stay in touch -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="widget footer-links">
                            <h5>Useful Links</h5>
                            <ul>
                                <li><a href="#">Enigma is a simple and flexible</a></li>
                                <li><a href="#">Multi-purpose WordPress theme</a></li>
                                <li><a href="#">Tons of Shortcodes included</a></li>
                                <li><a href="#">Fully Responsive Theme</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end useful links -->

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="widget footer-posts last">
                            <h5>Latest Posts</h5>
                            <div class="footer-entry-list">
                                <div class="footer-entry">
                                    <p>
                                        <a href="blog-single.html">Enigma is a simple and flexible</a>
                                    </p>
                                    <span>11 July, 2015</span>
                                </div> <!-- end entry -->

                                <div class="footer-entry">
                                    <p>
                                        <a href="blog-single.html">Multi-purpose WordPress theme</a>
                                    </p>
                                    <span>08 July, 2015</span>
                                </div> <!-- end entry -->

                                <div class="footer-entry">
                                    <p>
                                        <a href="blog-single.html">Tons of Shortcodes and Features</a>
                                    </p>
                                    <span>05 July, 2015</span>
                                </div> <!-- end entry -->
                            </div>
                        </div>
                    </div> <!-- end latest posts -->

                </div> <!-- end row -->
            </div> <!-- end footer widgets -->
        </div> <!-- end container -->

        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-12 copyright">
                        <div>
                            © 2018 Enigma Theme | Made by <a href="http://deothemes.com">DeoThemes</a>
                        </div>
                    </div>

                    <div class="col-sm-4 col-sm-offset-2 col-xs-12 footer-socials">
                        <div class="social-icons clearfix right">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-vimeo"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- end bottom footer -->
    </footer> <!-- end footer -->

    <div id="back-to-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
    </div>

</div>

<?php $this->endBody(); ?>

</body>
</html>

<?php $this->endPage() ?>
