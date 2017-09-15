<?php

/**
 * @abstract 菜单模板
 * @author   Yxl <zccem@163.com>
 */

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\components\iMenu\ShowMenu;

$dataMenu = ShowMenu::ShowMenuData('H1');

if (!is_array($dataMenu)) {
    $dataMenu = [
        'label' => '没有菜单 !!',
        'url'   => [
            '/site/index',
        ],
    ];
}

$member = [
    [
        'label' => '登录',
        'url'   => [
            '/Frontend/member/login',
        ],
    ],
    [
        'label' => '注册',
        'url'   => [
            '/Frontend/member/reg',
        ],
    ],
];

$dataMenu = array_merge($dataMenu, $member);

?>

<header id="header" class="full-header">
    <div id="header-wrap">
        <div class="container clearfix">
            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <div id="logo">
                <a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png">
                    <img src="<?= Yii::getAlias("@web") ?>/themes/default/images/logo.png" alt="<?= Yii::$app->params['TITLE']; ?>">
                </a>
                <a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png">
                    <img src="<?= Yii::getAlias("@web") ?>/themes/default/images/logo@2x.png" alt="<?= Yii::$app->params['TITLE']; ?>">
                </a>
            </div>

            <nav id="primary-menu">

                <?=
                Nav::widget(
                    [
                        'items' => $dataMenu,
                    ]
                );
                ?>

                <div id="top-cart">
                    <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>5</span></a>
                    <div class="top-cart-content">
                        <div class="top-cart-title">
                            <h4>Shopping Cart</h4>
                        </div>
                        <div class="top-cart-items">
                            <div class="top-cart-item clearfix">
                                <div class="top-cart-item-image">
                                    <a href="#"><img src="images/shop/small/1.jpg" alt="Blue Round-Neck Tshirt"/></a>
                                </div>
                                <div class="top-cart-item-desc">
                                    <a href="#">Blue Round-Neck Tshirt</a>
                                    <span class="top-cart-item-price">$19.99</span>
                                    <span class="top-cart-item-quantity">x 2</span>
                                </div>
                            </div>
                            <div class="top-cart-item clearfix">
                                <div class="top-cart-item-image">
                                    <a href="#"><img src="images/shop/small/6.jpg" alt="Light Blue Denim Dress"/></a>
                                </div>
                                <div class="top-cart-item-desc">
                                    <a href="#">Light Blue Denim Dress</a>
                                    <span class="top-cart-item-price">$24.99</span>
                                    <span class="top-cart-item-quantity">x 3</span>
                                </div>
                            </div>
                        </div>
                        <div class="top-cart-action clearfix">
                            <span class="fleft top-checkout-price">$114.95</span>
                            <button class="button button-3d button-small nomargin fright">View Cart</button>
                        </div>
                    </div>
                </div><!-- #top-cart end -->

                <!-- Top Search
                ============================================= -->
                <div id="top-search">
                    <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                    <form action="search.html" method="get">
                        <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                    </form>
                </div><!-- #top-search end -->

            </nav>

        </div>

    </div>

</header>