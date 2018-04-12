<?php
/**
 *
 * 分类列表
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/2/8
 * Time: 15:27
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="search">

    <?php
    $form = ActiveForm::begin([
        'action'      => ['search/purchase'],
        'method'      => 'post',
        'fieldConfig' => [
            'template'     => '<div>{input}</div>',
            'inputOptions' => ['class' => 'form-control'],
        ],
        'options'     => ['class' => 'form-horizontal']
    ]);
    ?>

    <div class="input-group">

        <form name="search" action="<?= Url::to(['/search/product']) ?>" method="get">

            <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    产品<span class="caret"></span>
                </button>
            </div>

            <input type="text" class="form-control" aria-label="请输入您要查询的关键字" placeholder="请输入您要查询的关键字" name="title"/>
            <span class="input-group-btn"><input type="submit" class="btn btn-red" value="搜索" /></span>

        </form>

    </div>

    <?php ActiveForm::end() ?>

</div>
<!-- #搜索 -->
                           f
<!-- 分类导航 -->
<div id="nav">

    <!-- 分类标题 -->
    <div class="mod_cate_hd">全部商品分类</div>

    <ul class="tit">

        <?php foreach ($result['nav'] as $value): ?>
            <li class="mod_cate">
                <h2>
                    <i class="arrow_dot fr"></i>
                    <a title="" href=""> <?= $value['name'] ?></a>
                </h2>

                <div class="mod_subcate">

                    <div class="mod_subcate_main">
                        <dl>
                            <dt>商家产品</dt>
                            <dd>
                                <a title="" href="">金属 /</a>
                                <a title="" href="">木材 /</a>
                                <a title="" href="">竹</a>
                            </dd>
                        </dl>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>

    </ul>

</div>

<div class="nav-cont" style="float: right;">
    <div class="pur-user-login">

        <?php if (Yii::$app->user->isGuest): ?>

            <div class="nav-cont-title">
                会员登录
            </div>

            <?php
            $form = ActiveForm::begin([
                'action'      => ['member/login'],
                'method'      => 'post',
                'fieldConfig' => [
                    'template'     => '<div>{input}</div>',
                    'inputOptions' => ['class' => 'form-control'],
                ],
                'options'     => ['class' => 'form-horizontal']
            ]);
            ?>

            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" placeholder="帐号" aria-describedby="帐号">
            </div>

            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pass"></i></span>
                <input type="text" class="form-control" placeholder="密码" aria-describedby="密码">
            </div>

            <div class="input-group">
                <?= Html::submitButton('登录', ['class' => 'btn btn-red']) ?>
            </div>

            <div class="input-group">
                <a class="reg" title="" href="<?= Url::to(['/member/reg']); ?>">免费注册</a>
            </div>

            <?php ActiveForm::end(); ?>

        <?php else: ?>

            <div class="nav-cont-title">
                会员登录
            </div>

        <?php endif; ?>

    </div>
    <!-- #用户登录,注册 -->

    <!-- 采购列表 -->
    <div class=" purchase-cont">

        <div class="nav-cont-title">
            采购动态<a title="" href="<?= Url::to(['/purchase/index']); ?>">...</a>
        </div>

        <div class="purchase-cont-list myscroll">

            <?php if (!empty($result['result'])): ?>
                <ul>

                    <?php foreach ($result['result'] as $value): ?>
                        <li><a title href="<?= Url::to(['/purchase/view', 'id' => $value['purchase_id']]) ?>">[采购] <?= $value['title'] ?></a></li>
                    <?php endforeach; ?>

                </ul>
            <?php else: ?>

                暂无信息 !!

            <?php endif; ?>

        </div>

    </div>
</div>