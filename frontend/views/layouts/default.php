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
use frontend\assets\AppAsset;
use common\models\Menu;
use common\widgets\iConf\ConfList;

AppAsset::register($this); // $this 代表视图对象

$ClsMenu = new Menu();

$this->beginPage();

// 滚动
$this->registerJsFile('@web/themes/qijian/js/jquery.js');

// 多语言 XML
$LangXml = simplexml_load_file(Yii::getAlias('@webroot') . '/language-en.xml');

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>

    <?= ConfList::widget(['config' => [$this->title, 'head']]); ?>

    <link rel="shortcut icon" href="<?= Url::to('@web/themes/enterprise/img') ?>/favicon.ico">
    <link rel="apple-touch-icon" href="<?= Url::to('@web/themes/enterprise/img') ?>/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= Url::to('@web/themes/enterprise/img') ?>/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= Url::to('@web/themes/enterprise/img') ?>/apple-touch-icon-114x114.png">

    <?php $this->head() ?>

    <script type="text/javascript">

        // JavaScript Document
        function urlredirect() {
            var sUserAgent = navigator.userAgent.toLowerCase();
            if ((sUserAgent.match(/(ipod|iphone os|midp|ucweb|android|windows ce|windows mobile)/i))) {
                // PC跳转移动端
                var thisUrl = window.location.href;
                window.location.href = thisUrl.substr(0, thisUrl.lastIndexOf('/') + 1) + 'index.php/mobile/';
            }
        }

        urlredirect();

    </script>

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
                                'items'   => $ClsMenu->findMenuNav('E1', 'cn'),
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

    <?= ConfList::widget(['config' => [$this->title, 'foot']]); ?>

    <div id="back-to-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
    </div>

</div>

<?php $this->endBody(); ?>

</body>
</html>

<?php $this->endPage() ?>
