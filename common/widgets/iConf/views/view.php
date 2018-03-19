<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/3/19
 * Time: 22:54
 */

use yii\helpers\Url;
use yii\helpers\Html;

?>

<p class="t-title"><?= $result['Conf']['NAME'] ?></p>

<p><span class="right-color">联系人 : </span><?= $result['Conf']['PERSON'] ?></p>
<p><span class="right-color">邮箱 : </span><?= $result['Conf']['EMAIL'] ?></p>
<p><span class="right-color">手机 : </span><?= $result['Conf']['PHONE'] ?></p>
<p><span class="right-color">公司地址 : </span><?= $result['Conf']['ADDRESS'] ?></p>
