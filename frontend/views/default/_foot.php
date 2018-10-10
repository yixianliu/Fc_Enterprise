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

<div class="col-xs-12">
    <?= \common\models\Menu::getFootMenuHtml(null, 'On', 1, Yii::$app->session[ 'language' ]) ?>
</div>

<div class="col-xs-12 foot-cont">

    <div class="col-xs-10">
        <p style="font-size: 24px;font-weight: bold;"><?= $conf[ 'PHONE' ] ?></p>
        <p style="font-weight: bold;">欢迎来电咨询</p>
        <p>地址 : <?= $conf[ 'ADDRESS' ] ?></p>
    </div>

    <div class="col-xs-2">
        <?= Html::img(Url::to('@web/temp/conf/' . $conf['QR_WX_CODE']), [ 'alt' => $conf[ 'NAME' ], 'width' => 150, 'height' => 150 ]); ?>
    </div>

</div>

<div class="col-xs-12 copy">@2018 <?= $conf[ 'ICP' ] ?></div>
