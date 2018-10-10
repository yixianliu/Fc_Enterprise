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

use yii\helpers\Html;

if ( empty($conf) || !is_array($conf) ) {
    return false;
}

?>

<title><?= Html::encode($this->title) ?> - <?= $conf[ 'NAME' ] ?> - <?= $conf[ 'TITLE' ] ?></title>

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

<meta name="description" content="<?= $conf[ 'DESCRIPTION' ] ?>" />
<meta name="author" content="<?= $conf[ 'DEVELOPERS' ] ?>" />
<meta name="keywords" content="<?= $conf[ 'KEYWORDS' ] ?>" />

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

<?= Html::csrfMetaTags(); ?>
