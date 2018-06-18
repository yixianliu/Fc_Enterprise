<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUploadUI;
use common\widgets\iConf\ConfList;

/* @var $this yii\web\View */
/* @var $model common\models\Purchase */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '采购中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('@web/themes/qijian/css/purzoom.css');

$this->registerJsFile('@web/themes/qijian/js/jquery1.42.min.js');
$this->registerJsFile('@web/themes/qijian/js/jquery.SuperSlide.2.1.1.js');
$this->registerJsFile('@web/themes/qijian/js/jqzoom/jquery.jqzoom.js');
$this->registerJsFile('@web/themes/qijian/js/jqzoom/base.js');

?>

<?= $this->render('../_slide'); ?>

<div class="container content">

    <?= $this->render('../_nav'); ?>

    <div class="conY">

        <div class="conY_tit"><?= $model->title ?></div>
        <div class="conY_dat">所有者：<?= $model->user_id ?>&nbsp;&nbsp;&nbsp;时间：<?= date('Y - m - d', $model->updated_at) ?></div>

        <div class="conY_text">
            <div class="right-extra">
                <div class="tendcont">

                    <div class="tend-left">
                        <div id="preview" class="spec-preview">

                            <span class="jqzoom">

                                <?php if (!empty($result)): ?>

                                    <?= Html::img(Url::to('@app/backend/web/temp/purchase/' . $result[0]), ['alt' => $this->title, 'jqimg' => Url::to('@app/backend/web/temp/purchase/' . $result[0])]); ?>

                                <?php else: ?>

                                    <?= Html::img(Url::to('@web/themes/qijian/not.jpg'), ['alt' => $this->title]); ?>

                                <?php endif; ?>

                            </span>
                        </div>

                        <?php if (!empty($result)): ?>
                            <div class="spec-scroll">
                                <a class="prev"></a><a class="next"></a>
                                <div class="items">
                                    <ul>

                                        <?php foreach ($result as $value): ?>
                                            <li>
                                                <?= Html::img(Url::to('@web/themes/qijian/images/' . $value), ['alt' => $this->title, 'bimg' => Url::to('@web/themes/qijian/images/pro-1.jpg'), 'onmousemove' => 'preview(this);']); ?>
                                            </li>
                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                    <!-- #左边.产品图片 -->

                    <!-- 右边.产品参数 -->
                    <div class="tend-right">

                        <div class="tend-up">
                            <div class="t-money">
                                <span class="right-color">价格 : </span><font><?= $model->price ?></font>
                            </div>
                        </div>

                        <hr>

                        <div class="tend-down">
                            <div class="tend-down-left">
                                <p>
                                    采购类型 : <?php if ($model->is_type == 'Long'): ?> 长期采购 <?php else: ?> 短期采购 <?php endif; ?><br/>
                                    采购状态 : <?php if ($model->is_status == 'On'): ?> 采购中 <?php else: ?> 不采购 <?php endif; ?><br/>
                                    采购数量 : <?= $model->num ?><br/>
                                    采购单位 : <?= $model->unit ?><br/>
                                    是否还需要采购 : <?php if ($model->is_using == 'On'): ?> 没有采纳对象 <?php else: ?> 已有采纳对象 <?php endif; ?>
                                </p>
                            </div>

                            <div class="tend-right-right">
                                <div class="tend-border">
                                    <?= ConfList::widget(['config' => [$this->title, 'view']]); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- #产品参数结束 -->

                <div style="clear:both;height:10px;"></div>

                <!-- 内容,评论 -->
                <div class="m" id="comment">

                    <!-- 切换按钮 -->
                    <ul class="tab clearfix">
                        <li onclick="tabs('#comment',0)" class="curr">商品详情<strong></strong></li>
                    </ul>
                    <!-- #切换按钮 -->

                    <!-- 图文介绍 -->
                    <div class="mc tabcon" style="display:block;">
                        <div class="norecode">
                            <?= $model->content ?>
                        </div>
                    </div>
                    <!-- #图文介绍 -->

                </div>
                <!-- #内容,评论 -->

                <hr/>

                <div class="release-message">
                    <?php if ($offer == true): ?>

                        <?php if (!empty(Yii::$app->user->identity->user_id)): ?>

                            <?php if (Yii::$app->user->identity->is_auth == 'On'): ?>

                                <?php $form = ActiveForm::begin(['action' => ['sp-offer/create', 'id' => 'P0', 'type' => 'Purchase'], 'method' => 'post',]); ?>

                                <p class="right-tar">
                                    <span class="right-color">提交价格 : </span><?= $form->field($modelOffer, 'price')->textInput()->label(false) ?>
                                </p>

                                <p><?= $form->field($modelOffer, 'content')->textarea(['rows' => 6]); ?></p>

                                <p><?= $this->render('../upload', ['model' => $modelOffer, 'text' => '提供相关图片', 'form' => $form, 'attribute' => 'path', 'id' => 1]); ?></p>

                                <p><?= Html::submitButton('提交内容', ['class' => 'btn btn-red']) ?></p>

                                <br/>

                                <p>
                                    <?= Yii::$app->view->renderFile('@app/views/default/formMsg.php'); ?>
                                </p>

                                <?= $form->field($modelOffer, 'offer_id')->hiddenInput(['value' => $model->purchase_id])->label(false) ?>

                                <?php ActiveForm::end(); ?>

                            <?php else: ?>

                                <h3>用户还未被审核验证通过,请等待验证后,提交价格 !!</h3>

                            <?php endif; ?>

                        <?php else: ?>

                            <h3>请登录后提交内容 !! </h3>
                            <br/>
                            点这里, <a href="<?= Url::to(['member/login']) ?>" title="<?= $model->title ?>">用户登录</a>

                        <?php endif; ?>

                    <?php else: ?>

                        <h2>此采购已被采纳 !!</h2>

                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>