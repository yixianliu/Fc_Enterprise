<?php

/**
 *  登录模板
 *
 * @author Yxl <zccem@163.com>
 */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '挂载中心';
?>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>


<div class="jumbotron">
    <div class="container">
        <h1>Hello, world !</h1>
        <br/>
        <p class="text-left">
        <h5>一款为创意工作者设计的时间管理应用,拥有任务清单、在线番茄钟、工作周报、云同步等功能,你可以随时在 Web、Android、iPhone 等设备上使用它。</h5>
        </p>
        <br/>
        <p><a class="btn btn-primary" href="<?= Url::to(['Mount/run/index']); ?>" role="button">了解更多 »</a></p>
    </div>
</div>

<div class="container">

    <div class="blog-header">
        <h1 class="blog-title">作者博客</h1>
        <p class="lead blog-description"><h5>关于程序最新的更新,请关注作者博客...</h5></p>
    </div>

</div>