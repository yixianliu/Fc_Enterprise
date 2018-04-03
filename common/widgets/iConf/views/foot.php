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

$img = empty($result['code']['parameter']) ? 'themes/qijian/images/code.jpg' : '/../../../backend/web/temp/conf/' . $result['code']['parameter'];

$footHtml = null;

if (!empty($result['footArray'])) {

    // 循环
    foreach ($result['footArray'] as $value) {

        if ($value['menuModel']['url_key'] == 'pages') {
            $footHtml .= ' <li><a title="' . $value['name'] . '" href="' . Url::to(['pages/' . $value['is_type'] . '/?id=' . $value['pages']['page_id']]) . '">' . $value['name'] . '</a></li>';
            continue;
        }

        if ($value['menuModel']['url_key'] == 'urls') {
            $footHtml .= ' <li><a title="' . $value['name'] . '" href="' . Url::to([$value['url']]) . '">' . $value['name'] . '</a></li>';
            continue;
        }

        $footHtml .= ' <li><a title="' . $value['name'] . '" href="' . Url::to([$value['menuModel']['url_key'] . '/' . $value['is_type']]) . '">' . $value['name'] . '</a></li>';
    }
}

?>

<div class="container-fluid foot">
    <div class="container">

        <div class="col-xs-12">
            <ul>
                <?= $footHtml ?>
            </ul>
        </div>

        <div class="col-xs-12 foot-cont">

            <div class="col-xs-10">
                <p style="font-size: 24px;font-weight: bold;"><?= $result['Conf']['PHONE'] ?></p>
                <p style="font-weight: bold;">欢迎来电咨询</p>
                <p>地址 : <?= $result['Conf']['ADDRESS'] ?></p>
            </div>

            <div class="col-xs-2">
                <?= Html::img(Url::to('@web/' . $img), ['alt' => '']); ?>
            </div>

        </div>

        <div class="col-xs-12 copy">@2018 <?= $result['Conf']['ICP'] ?></div>

    </div>
</div>

