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

<div class="right">

    <div class="col_full userdata-cont">

        <div class="cont-title">
            <span><?= $this->title ?></span>
        </div>

        <div class="row">
            <div class="col-xs-12" style="font-size: 12px;margin: 0;padding: 20px 0px;">

                <?php
                $form = ActiveForm::begin([
                    'action'      => ['user/info'],
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
                    <label for="nickname" class="col-sm-2 control-label">昵称:</label>
                    <div class="col-sm-10">

                        <?=
                        $form->field($model, 'nickname')
                            ->textInput(['maxlength' => true, 'aria-describedby' => '昵称', 'placeholder' => '昵称'])
                            ->label(false)
                        ?>

                    </div>
                </div>

                <div class="form-group">
                    <label for="nickname" class="col-sm-2 control-label">性别:</label>
                    <div class="col-sm-10">
                        <?=
                        $form->field($model, 'sex')->widget(Select2::classname(), [
                            'data'    => ['Male' => '男', 'Female' => '女'],
                            'options' => ['placeholder' => '性别...'],
                        ])->label(false);
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="person" class="col-sm-2 control-label">个性签名:</label>
                    <div class="col-sm-10">

                        <?= $form->field($model, 'signature')->textarea(['rows' => 10])->label(false) ?>
                        <font style="color: #aaa;">(限制128字符之内)</font>

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <?= Html::submitButton('修改用户资料', ['class' => 'btn btn-red']) ?>
                    </div>
                </div>

                <?php ActiveForm::end() ?>

            </div>

        </div>

    </div>

    <br/>

    <?= Yii::$app->view->renderFile('@app/views/default/formMsg.php'); ?>

</div>

