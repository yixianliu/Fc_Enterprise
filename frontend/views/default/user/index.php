<?php
/**
 *
 * 用户中心
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/12/18
 * Time: 18:23
 */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = '用户中心';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="right">
    <div class="col-lg-12">
        <div class="col_full">

            <div class="cont-title"><span><?= $this->title ?></span></div>

            <div class="row shop-cont">

                <h3>采购平台</h3>
                <h3>产品中心</h3>
                <h3>新闻热点</h3>

            </div>
        </div>

        <br/>

        <?= Yii::$app->view->renderFile('@app/views/default/formMsg.php'); ?>

    </div>
</div>