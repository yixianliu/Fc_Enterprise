<?php
/**
 *
 * 网站左边内容模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/2/5
 * Time: 15:38
 */

use yii\helpers\Url;
use yii\helpers\Html;

?>

<div class="left">

    <div class="box"><?= Yii::$app->view->params[ 'MenuArray' ][ 'name' ] ?></div>

    <div class="cat_list">
        <?= \common\models\Menu::getLeftMenuHtml(Yii::$app->view->params[ 'MenuArray' ]); ?>
    </div>

    <div class="contact">

        <?= Html::img(Url::to('@web/themes/qijian/images/contact.jpg'), [ 'alt' => $this->title ]); ?>

        <ul class="contact_us">
            <li><a><?= Yii::t('app', 'company') ?> ：<?= Yii::$app->view->params[ 'ConfArray' ][ 'NAME' ] ?></a></li>
            <li><a><?= Yii::t('app', 'contacts') ?> ：<?= Yii::$app->view->params[ 'ConfArray' ][ 'PERSON' ] ?></a></li>
            <li><a><?= Yii::t('app', 'phone') ?> ：<span><?= Yii::$app->view->params[ 'ConfArray' ][ 'PHONE' ] ?></span></a></li>
            <li><a><?= Yii::t('app', 'address') ?> ：<span><?= Yii::$app->view->params[ 'ConfArray' ][ 'ADDRESS' ] ?></span></a></li>
        </ul>

    </div>

</div>
