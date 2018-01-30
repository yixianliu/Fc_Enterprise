<?php
/**
 *
 * 用户资料
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/30
 * Time: 11:53
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

$this->title = '用户资料';
$this->params['breadcrumbs'][] = $this->title;

?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<?= $this->render('../slide', ['pagekey' => 'user']); ?>

<?= $this->render('../nav'); ?>

<section class="section-wrap blog-standard" style="padding: 60px 0">
    <div class="container relative">
        <div class="row">

            <div class="col-sm-3 sidebar blog-sidebar">
                <?= $this->render('../user/_left'); ?>
            </div>

            <div class="col-sm-9 blog-content">

                <?php $form = ActiveForm::begin(['action' => ['user/info'], 'method' => 'POST',]); ?>

                <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'readonly' => 'readonly']) ?>

                <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

                <?php if ($model->is_type == 'enterprise' || $model->is_type == 'supplier'): ?>
                    <?= $form->field($model, 'enterprise')->textInput(['maxlength' => true]) ?>
                <?php endif ?>

                <?= $form->field($model, 'signature')->textarea(['rows' => 10]) ?>

                <?=
                $form->field($model, 'sex')->widget(Select2::classname(), [
                    'data'    => ['Male' => '男', 'Female' => '女'],
                    'options' => ['placeholder' => '性别...'],
                ]);
                ?>

                <?= Html::submitButton('修改用户资料', ['class' => 'btn btn-color btn-submit']) ?>

                <?php ActiveForm::end() ?>

            </div>

        </div>

        <?= Yii::$app->view->renderFile('@app/views/default/formMsg.php'); ?>

    </div>
</section>
