<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/6/7
 * Time: 17:31
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '在线留言';
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('../_slide'); ?>

<div class="container content">

    <?= $this->render('../_left'); ?>

    <div class="right">

        <?= $this->render('../_nav'); ?>

        <?php $form = ActiveForm::begin(['action' => ['comment/index'], 'method' => 'post',]); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'content')->textarea(['maxlength' => true, 'rows' => 10]) ?>

        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('发布留言', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>

<?= Yii::$app->view->renderFile('@app/views/default/formMsg.php'); ?>
