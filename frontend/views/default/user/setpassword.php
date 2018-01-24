<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/24
 * Time: 11:50
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '修改密码';

$this->params['breadcrumbs'][] = ['label' => '用户中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->user_id]];

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

                <?php $form = ActiveForm::begin(['action' => ['user/setpassword'], 'method' => 'post', 'id' => $model->formName()]); ?>

                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'newpassword')->passwordInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => true]) ?>

                <?= Html::submitButton('修改密码', ['class' => 'btn btn-color btn-submit']) ?>

                <?php ActiveForm::end() ?>

            </div>

        </div>

        <?= Yii::$app->view->renderFile('@app/views/default/formMsg.php'); ?>

    </div>
</section>
