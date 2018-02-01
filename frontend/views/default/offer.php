<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/2/1
 * Time: 10:02
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

if (empty($id) || empty($type))
    return false;

?>

<div class="row">
    <div class="col-md-12">

        <hr/>

        <?php if (!Yii::$app->user->isGuest): ?>

            <?php $form = ActiveForm::begin(['action' => ['sp-offer/create', 'id' => $id, 'type' => $type], 'method' => 'post',]); ?>

            <?= $form->field($modelOffer, 'price')->textInput(['maxlength' => true]) ?>

            <?= Html::submitButton('提交价格', ['class' => 'btn btn-primary']) ?>

            <?php ActiveForm::end(); ?>

        <?php else: ?>

        <h3>登录后,可以提交价格 !!</h3>

        <?php endif; ?>

        <hr/>

    </div>
</div>
