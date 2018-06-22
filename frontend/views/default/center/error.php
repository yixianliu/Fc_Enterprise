<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/6/21
 * Time: 15:39
 */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = '页面出错';

?>

<div class="container-fluid advantage">
    <div class="container">

        <div class="row text-center">

            <div style="font-size: 120px;"><font>404</font></div>
            <h1><?= $message ?></h1>

            <br />
            <a href="#" onClick="history.go(-1)">返回上一页</a> or <?= Html::a('返回首页', ['center/index']) ?>

        </div>

    </div>
</div>

