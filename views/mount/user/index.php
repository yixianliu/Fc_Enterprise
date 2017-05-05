<?php

/**
 *  登录模板
 *
 *  @author Yxl <zccem@163.com>
 */
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\iAjax\AjaxMsg;

$this->title = '个人中心';
?>

<br />
<br />

<div class="row">

    <div class="col-md-12">

        <dl class="dl-horizontal">
            <dt>用户名 : </dt>
            <dd><?= Yii::$app->session['MountAdmin']['username']; ?></dd>
        </dl>

        <dl class="dl-horizontal">
            <dt>用户IP : </dt>
            <dd><?= Yii::$app->request->userIP; ?></dd>
        </dl>

        <dl class="dl-horizontal">
            <dt>登录时间 : </dt>
            <dd><?= Yii::$app->formatter->asTime(Yii::$app->session['MountAdmin']['time']); ?></dd>
        </dl>

    </div>

</div>
