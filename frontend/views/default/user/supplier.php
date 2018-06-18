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

$this->title = '企业用户资料';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="right">

    <div class="col_full userdata-cont">

        <div class="cont-title"><span><?= $this->title ?></span></div>

        <div class="row">
            <div class="col-xs-12" style="font-size: 12px;margin: 0;padding: 20px 0px;">

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
                    <label for="nickname" class="col-sm-2 control-label">企业名称:</label>
                    <div class="col-sm-10">

                        <?=
                        $form->field($model, 'name')
                            ->textInput(['maxlength' => true, 'aria-describedby' => '昵称', 'placeholder' => '昵称'])
                            ->label(false)
                        ?>

                    </div>
                </div>

                <div class="form-group">
                    <label for="person" class="col-sm-2 control-label">企业介绍:</label>
                    <div class="col-sm-10">

                        <?= $form->field($model, 'content')->textarea(['rows' => 10])->label(false) ?>

                    </div>
                </div>

                <?= $this->render('../upload', ['model' => $model, 'form' => $form, 'id' => $model->user_id]); ?>

                <div class="form-group" style="margin-left: 0px;margin-right: 0px;">
                    <div class="col-sm-12">
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