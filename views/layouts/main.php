<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
    <head>
        <meta charset="<?= Yii::$app->charset; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?= Html::csrfMetaTags(); ?>

        <title><?= Html::encode($this->title); ?></title>

        <?php $this->head(); ?>

        <style type="text/css">

            html, body, * {
                font-family: 'Microsoft YaHei';
                font-size: 14px;
                letter-spacing: 1px;
            }

        </style>

    </head>

    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => '自律日历',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top'
                ]
            ]);
            echo Nav::widget([
                'options' => [
                    'class' => 'navbar-nav navbar-right'
                ],
                'items' => [
                    [
                        'label' => '首页',
                        'url' => [
                            '/site/index'
                        ]
                    ],
                    [
                        'label' => '关于我们',
                        'url' => [
                            '/site/about'
                        ]
                    ],
                    [
                        'label' => '联系我们',
                        'url' => [
                            '/site/contact'
                        ]
                    ],
                    Yii::$app->user->isGuest ? ([
                        'label' => '登录',
                        'url' => [
                            '/site/login'
                        ]
                            ]) : ('<li>' . Html::beginForm([
                                '/site/logout'
                                    ], 'post', [
                                'class' => 'navbar-form'
                            ]) . Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', [
                                'class' => 'btn btn-link'
                            ]) . Html::endForm() . '</li>')
                ]
            ]);

            NavBar::end();
            ?>

            <div class="container">

                <?= Breadcrumbs::widget(['links' => isset($this->params ['breadcrumbs']) ? $this->params ['breadcrumbs'] : []]); ?>

                <?= $content; ?>

            </div>
        </div>

        <footer class="footer">
            <div class="container">

                <p class="pull-left" style="">&copy; 所属版权 <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>

            </div>
        </footer>

        <?php $this->endBody(); ?>

    </body>
</html>

<?php $this->endPage(); ?>
