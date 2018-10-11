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

if ( empty(Yii::$app->view->params[ 'ConfArray' ]) || !is_array(Yii::$app->view->params[ 'ConfArray' ]) ) {
    return false;
}

?>

<title><?= Html::encode($this->title) ?> - <?= Yii::$app->view->params[ 'ConfArray' ][ 'NAME' ] ?> - <?= Yii::$app->view->params[ 'ConfArray' ][ 'TITLE' ] ?></title>

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

<meta name="description" content="<?= Yii::$app->view->params[ 'ConfArray' ][ 'DESCRIPTION' ] ?>" />
<meta name="author" content="<?= Yii::$app->view->params[ 'ConfArray' ][ 'DEVELOPERS' ] ?>" />
<meta name="keywords" content="<?= Yii::$app->view->params[ 'ConfArray' ][ 'KEYWORDS' ] ?>" />

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

<?= Html::csrfMetaTags(); ?>
