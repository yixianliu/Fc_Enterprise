<?php
/**
 *
 * 底部模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/24
 * Time: 15:26
 */

use yii\helpers\Url;
use yii\helpers\Html;

?>

<div class="col-xs-12 foot-cont">

    <div class="col-xs-10">
        <p style="font-size: 24px;font-weight: bold;"><?= $result['Conf']['PHONE'] ?></p>
        <p style="font-weight: bold;">欢迎来电咨询</p>
        <p>地址 : <?= $result['Conf']['ADDRESS'] ?></p>
    </div>

    <div class="col-xs-2">
        <?= Html::img(Url::to('@web/themes/qijian/images/code.jpg'), ['alt' => '']); ?>
    </div>

</div>

<div class="col-xs-12 copy">@2018 <?= $result['Conf']['ICP'] ?></div>