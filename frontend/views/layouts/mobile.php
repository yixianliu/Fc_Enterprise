<?php
/**
 *
 * 手机版布局模版
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/12
 * Time: 11:09
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

?>
