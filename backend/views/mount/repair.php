<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/10/18
 * Time: 11:04
 */

use yii\helpers\Html;

$this->title = '修复数据库和数据表';

?>

<div class="col-lg-12">
    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left">网站挂载中心</h2></header>

        <div class="content-body">
            <div class="row">

                <ul>
                    <li>网站配置表 / <?= Html::a('修复', ['repair/conf'], ['id' => 'RepairId']) ?></li>
                    <li>菜单表 / <?= Html::a('修复', ['repair/menu'], ['id' => 'RepairId']) ?></li>
                </ul>

                <?= Yii::$app->view->renderFile( '@app/views/formMsg.php' ); ?>

            </div>
        </div>
    </section>
</div>

