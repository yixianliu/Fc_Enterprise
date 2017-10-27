<?php

use yii\helpers\Html;
use backend\assets\AppAsset;


AppAsset::register($this); // $this 代表视图对象

$this->beginPage();

?>

<!DOCTYPE html>
<html class=" ">
<head>

    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <title>管理中心 - <?= Yii::$app->params['Conf']['NAME'] ?> - <?= Yii::$app->params['Conf']['TITLE'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <?= Html::csrfMetaTags() ?>

    <?php $this->head() ?>

    <style>
        *, body, html, h1, h2, h3, h4, a, li {
            font-family: 'Microsoft YaHei';
            letter-spacing: 1px;
        }
    </style>

</head>
<body class=" ">

<?php $this->beginBody() ?>

<?= Yii::$app->view->renderFile('@app/views/notifications.php'); ?>

<div class="page-container row-fluid">

    <div class="page-sidebar ">
        <?= Yii::$app->view->renderFile('@app/views/menu.php'); ?>
    </div>

    <section id="main-content" class=" ">
        <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>

            <?= $content ?>

        </section>
    </section>

</div>

<?php $this->endBody(); ?>

</body>
</html>

<?php $this->endPage() ?>
