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

$this->title = '网站留言';

?>

<?= $this->render('../slide', ['pagekey' => 'comment']); ?>

<div class="container content">

    <?= $this->render('../_left'); ?>

    <!-- 右边 -->
    <div class="right">

        <?= $this->render('../_nav'); ?>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('发布留言', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

    <?= Yii::$app->view->renderFile('@app/views/default/formMsg.php'); ?>

</div>
