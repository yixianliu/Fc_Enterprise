<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/3/21
 * Time: 15:47
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '企业商户档案';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="right">

    <div class="col_full userdata-cont">

        <div class="cont-title"><span><?= $this->title ?></span></div>

        <div class="row">
            <div class="col-md-12">

                <br/>
                <br/>

                <?php
                $form = ActiveForm::begin([
                    'action'      => ['user/supplier'],
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
                    <div class="col-md-12">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => '请输入商户名称...'])->label(false) ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <?= $form->field($model, 'content')->textarea(['rows' => 10, 'placeholder' => '请输入商户介绍...']) ?>
                    </div>
                </div>

                <?= $this->render('../upload', ['model' => $model, 'form' => $form, 'id' => $model->user_id]); ?>

                <div class="form-group">
                    <div class="col-md-12">
                        <?= Html::submitButton('修改企业用户资料', ['class' => 'btn btn-red']) ?>
                    </div>
                </div>

                <?php ActiveForm::end() ?>

            </div>

        </div>

    </div>

    <br/>

    <?= Yii::$app->view->renderFile('@app/views/default/formMsg.php'); ?>

</div>