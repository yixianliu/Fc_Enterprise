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

<ul>
    <li><a>公司名称：<?= $result['Conf']['NAME'] ?></a></li>
    <li><a>联系人：李xx 总经理</a></li>
    <li><a>联系电话：<span><?= $result['Conf']['PHONE'] ?></span></a></li>
    <li><a>公司地址：<span>广东省吴川市区塘尾街道325国道北面羽绒产业基地内</span></a></li>
</ul>
