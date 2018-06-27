<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/6/6
 * Time: 10:06
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '编辑模板';

?>

<div class="col-lg-12">
    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?></h2></header>

        <div class="content-body">
            <div class="row">

                <?php $form = ActiveForm::begin(['action' => ['admin/tpl/edit', 'id' => $model->fileName, 'path' => $model->path], 'method' => 'post']); ?>

                <?= $form->field($model, 'path')->textInput(['maxlength' => true, 'disabled' => 'disabled']) ?>

                <?= $form->field($model, 'fileName')->textInput(['maxlength' => true, 'disabled' => 'disabled']) ?>

                <?= $form->field($model, 'content')->textarea(['rows' => 32]) ?>

                <div class="form-group">

                    <?= Html::submitButton('保存内容', ['class' => 'btn btn-primary']) ?>

                    <?= Html::a('返回列表', ['/admin/tpl/index'], ['class' => 'btn btn-primary']) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

        <?= Yii::$app->view->renderFile('@app/views/formMsg.php'); ?>

    </section>
</div>