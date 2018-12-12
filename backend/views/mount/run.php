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

$this->title = '网站挂载中心';

?>

<div class="col-lg-12">

    <?= Yii::$app->view->renderFile('@app/views/formMsg.php'); ?>

    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left">网站挂载中心</h2></header>

        <div class="content-body">
            <div class="row">

                <?php $form = ActiveForm::begin(['action' => ['mount/center/run'], 'method' => 'post', 'id' => $model->formName()]); ?>

                <?= $form->field($model, 'name')->textInput(['value' => Yii::$app->params['NAME']]); ?>

                <?= $form->field($model, 'title')->textInput(['value' => Yii::$app->params['TITLE']]); ?>

                <?= $form->field($model, 'description')->textarea(['value' => Yii::$app->params['DESCRIPTION']]); ?>

                <?= $form->field($model, 'developers')->textarea(['value' => Yii::$app->params['DEVELOPERS']]); ?>

                <?= $form->field($model, 'keywords')->textarea(['value' => Yii::$app->params['KEYWORDS']]); ?>

                <?= $form->field($model, 'phone')->textarea(['value' => Yii::$app->params['PHONE']]); ?>

                <?= $form->field($model, 'person')->textarea(['value' => Yii::$app->params['PERSON']]); ?>

                <?= $form->field($model, 'address')->textarea(['value' => Yii::$app->params['ADDRESS']]); ?>

                <p class="submit">
                    <?= Html::submitButton('确认挂载', ['class' => 'btn btn-primary']) ?>
                </p>

                <?php ActiveForm::end() ?>

            </div>
        </div>
    </section>

    <?= Yii::$app->view->renderFile('@app/views/formMsg.php'); ?>

</div>
