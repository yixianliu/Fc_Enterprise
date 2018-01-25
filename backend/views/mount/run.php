<?php
/**
 *
 * 安装数据库模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/10/26
 * Time: 10:17
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
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <?php
                    $form = ActiveForm::begin(['action' => ['mount/center/run'], 'method' => 'post', 'id' => $model->formName()]);
                    ?>

                    <?=
                    $form->field($model, 'name')->textInput(['class' => 'form-control', 'value' => Yii::$app->params['NAME']])
                        ->label('网站名称');
                    ?>

                    <?=
                    $form->field($model, 'title')->textInput(['class' => 'form-control', 'value' => Yii::$app->params['TITLE']])
                        ->label('网站标题');
                    ?>

                    <?=

                    // Normal select with ActiveForm & model
                    $form->field($model, 'mysql_data')->widget(Select2::classname(), [
                        'data'          => ['On' => '启用', 'Off' => '关闭'],
                        'options'       => ['placeholder' => '请选择 ...'],
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
        </div>
    </section>
</div>
