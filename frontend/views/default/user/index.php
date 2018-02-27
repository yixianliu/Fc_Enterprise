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

            <div class="cont-title">
                <span><?= $this->title ?></span>
            </div>

            <div class="row shop-cont">

                <?php if (empty($result['product'])): ?>

                    <?php foreach ($result['product'] as $value): ?>
                        <div class="col-md-4">
                            <div class="shop-img">
                                <a title="" href="">
                                    <?= Html::img(Url::to('@web/themes/qijian/images/200x200.gif'), ['alt' => '', 'class' => '']); ?>
                                </a>
                            </div>
                            <div class="shop-txt">
                                <a title="" href=""><?= $value['title'] ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                <?php else: ?>

                <h1>暂无数据 !!</h1>

                <?php endif; ?>

            </div>
        </div>
    </div>
</div>