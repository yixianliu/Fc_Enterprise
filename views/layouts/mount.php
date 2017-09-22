<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$this->title = '挂载中心';
?>

<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
<head>
    <meta charset="<?= Yii::$app->charset; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link type="image/x-icon" href="./favicon.ico" rel="shortcut icon"/>

    <?= Html::csrfMetaTags(); ?>

    <title><?= Html::encode($this->title); ?> - <?= Yii::$app->params['NAME']; ?> - <?= Yii::$app->params['TITLE']; ?></title>

    <?php $this->head(); ?>

    <style type="text/css">
        html, body, *, p {
            font-family: 'Microsoft YaHei';
            letter-spacing: 1px;
        }

    </style>

    <?= Html::jsFile('@web/themes/jquery.js') ?>

</head>

<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <?php
    NavBar::begin([
        'brandLabel' => '挂载中心',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top'
        ]
    ]);

    if (!empty(Yii::$app->session->get('MountAdmin'))) {

        echo Nav::widget([
            'options' => [
                'class' => 'navbar-nav navbar-right'
            ],
            'items' => [
                [
                    'label' => '首页',
                    'url' => [
                        '/Mount/center/view'
                    ]
                ],
                [
                    'label' => '进行挂载',
                    'url' => [
                        '/Mount/run/index'
                    ]
                ],
                [
                    'label' => '个人中心',
                    'url' => [
                        '/Mount/user/index'
                    ]
                ],
                [
                    'label' => '注销',
                    'url' => [
                        '/Mount/member/logout'
                    ]
                ],
            ]
        ]);
    } // 没有登录
    else {

        echo Nav::widget([
            'options' => [
                'class' => 'navbar-nav navbar-right'
            ],
            'items' => [
                [
                    'label' => '登录',
                    'url' => [
                        '/Mount/member/login'
                    ]
                ],
            ]
        ]);
    }

    NavBar::end();
    ?>

    <div class="container">

        <?= Breadcrumbs::widget(['links' => isset($this->params ['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>

        <?= $content ?>

    </div>

</div>

<?php $this->endBody(); ?>

</body>
</html>

<?php $this->endPage(); ?>
