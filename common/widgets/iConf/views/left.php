<?php
/**
 *
 * 详情页面左下角
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/24
 * Time: 15:30
 */

use yii\helpers\Url;
use yii\helpers\Html;

?>

<ul class="contact_us">
    <li><a>公司名称：<?= $result['Conf']['NAME'] ?></a></li>
    <li><a>联系人：<?= $result['Conf']['PERSON'] ?></a></li>
    <li><a>联系电话：<span><?= $result['Conf']['PHONE'] ?></span></a></li>
    <li><a>公司地址：<span><?= $result['Conf']['ADDRESS'] ?></span></a></li>
</ul>
