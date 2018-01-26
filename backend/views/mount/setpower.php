<?php
/**
 *
 * 存入权限
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/11/14
 * Time: 14:54
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

?>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">网站挂载中心</h2>
        </header>
        <div class="content-body">
            <div class="row">

                <?php
                $form = ActiveForm::begin(['action' => ['mount/center/setpower'], 'method' => 'post', 'id' => $model->formName()]);
                ?>

                <?=

                // Normal select with ActiveForm & model
                $form->field($model, 'admin')->widget(Select2::classname(), [
                    'data'          => ['On' => '启用', 'Off' => '关闭'],
                    'options'       => ['placeholder' => '是否开启管理员权限包 ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);

                ?>

                <?=

                // Normal select with ActiveForm & model
                $form->field($model, 'user')->widget(Select2::classname(), [
                    'data'          => ['On' => '启用', 'Off' => '关闭'],
                    'options'       => ['placeholder' => '是否开启普通用户权限包 ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);

                ?>

                <p class="submit">
                    <?= Html::submitButton('确认挂载', ['class' => 'btn btn-primary btn-block']) ?>
                </p>

                <?php ActiveForm::end() ?>

                <?= Yii::$app->view->renderFile('@app/views/formMsg.php'); ?>

            </div>
        </div>
    </section>
</div>
