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

$ConfArray = \common\models\Conf::findByConfArray(Yii::$app->session['language']);

?>

    <div class="right">
        <div class="col-xs-12">
            <div class="user-box">

                <div class="cont-title">
                    <span>我关注的采购商品</span>
                    <span class="more"><?= Html::a('更多', Url::to(['purchase/index']), ['title' => $ConfArray['NAME']]) ?></span>
                </div>

                <div class="user-box-cont">

                    <div class="row">

                        <h3>采购平台</h3>
                        <h3>产品中心</h3>
                        <h3>新闻热点</h3>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <br/>

<?= Yii::$app->view->renderFile('@app/views/default/formMsg.php'); ?>