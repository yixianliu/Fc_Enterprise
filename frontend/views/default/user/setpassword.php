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

<div class="right">

    <div class="col_full userdata-cont">

        <div class="cont-title">
            <span>修改个人资料</span>
        </div>

        <div class="row">
            <div class="col-xs-12" style="font-size: 12px;margin: 0;padding: 20px 0px;">

                <?php
                $form = ActiveForm::begin([
                    'action'      => ['user/setpassword'],
                    'method'      => 'post',
                    'id'          => $model->formName(),
                    'fieldConfig' => [
                        'template'     => '<div>{input}</div>',
                        'inputOptions' => ['class' => 'form-control'],
                    ],
                    'options'     => ['class' => 'form-horizontal']
                ]);
                ?>

                <div class="form-group">
                    <label for="nickname" class="col-sm-2 control-label">当前密码:</label>
                    <div class="col-sm-10">

                        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true])->label(false) ?>

                    </div>
                </div>

                <div class="form-group">
                    <label for="enterprise" class="col-sm-2 control-label">新密码:</label>
                    <div class="col-sm-10">

                        <?= $form->field($model, 'newpassword')->passwordInput(['maxlength' => true])->label(false) ?>

                    </div>
                </div>

                <div class="form-group">
                    <label for="enterprise" class="col-sm-2 control-label">确认新密码:</label>
                    <div class="col-sm-10">

                        <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => true])->label(false) ?>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <?= Html::submitButton('修改密码', ['class' => 'btn btn-red']) ?>
                    </div>
                </div>

                <?php ActiveForm::end() ?>

            </div>

            <?= Yii::$app->view->renderFile('@app/views/default/formMsg.php'); ?>

        </div>

    </div>

</div>
