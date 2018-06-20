<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Job */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '招聘中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<?= $this->render('../_slide'); ?>

<div class="container content">

    <!-- 左边 -->
    <?= $this->render('../_left'); ?>
    <!-- #左边 -->

    <!-- 右边 -->
    <div class="right">

        <?= $this->render('../_nav'); ?>

        <div class="conY">
            <div class="conY_tit"><?= $model->title ?></div>

            <div class="conY_dat">作者：admin&nbsp;&nbsp;&nbsp;时间：<?= date('Y - m - d', $model->updated_at) ?></div>

            <div class="conY_text">
                <?= $model->content ?>
            </div>

            <hr/>

            <?php if (!empty(Yii::$app->user->identity->user_id)): ?>

                <?php if (Yii::$app->user->identity->is_using == 'On'): ?>

                    <div class="conY_text">

                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($modelResume, 'title')->textInput(['maxlength' => true]) ?>

                        <?=
                        $form->field($modelResume, 'content')->widget('kucha\ueditor\UEditor', [
                            'clientOptions' => [
                                //设置语言
                                'lang'               => 'zh-cn',
                                'initialFrameHeight' => '600',
                                'elementPathEnabled' => false,
                                'wordCount'          => false,
                            ]
                        ]);
                        ?>

                        <div class="form-group">
                            <?= Html::submitButton('应聘', ['class' => 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>

                    <?= Yii::$app->view->renderFile('@app/views/default/formMsg.php'); ?>

                <?php else: ?>

                    <h3>没有经过审核,无法提交简历 !! </h3>

                <?php endif; ?>


            <?php else: ?>

                <h3>请登录后提交内容 !! </h3>
                <br/>
                点这里, <a href="<?= Url::to(['member/login']) ?>" title="<?= $model->title ?>">用户登录</a>

            <?php endif; ?>

        </div>
    </div>

</div>