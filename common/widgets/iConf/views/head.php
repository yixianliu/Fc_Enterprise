<?php
/**
 *
 * 头部模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/11/11
 * Time: 9:51
 */

use yii\helpers\Url;
use yii\helpers\Html;

?>

<title><?= Html::encode($result['title']) ?> - <?= $result['Conf']['NAME'] ?> - <?= $result['Conf']['TITLE'] ?></title>

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

<meta content="<?= $result['Conf']['DESCRIPTION'] ?>" name="description"/>
<meta content="<?= $result['Conf']['DEVELOPERS'] ?>" name="author"/>
<meta content="<?= $result['Conf']['KEYWORDS'] ?>" name="keywords"/>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

<?= Html::csrfMetaTags(); ?>
