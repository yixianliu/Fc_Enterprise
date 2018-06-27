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

                <p class="submit">
                    <?= Html::submitButton('确认挂载', ['class' => 'btn btn-primary btn-block']) ?>
                </p>

                <?php ActiveForm::end() ?>

                <?= Yii::$app->view->renderFile('@app/views/formMsg.php'); ?>

            </div>
        </div>
    </section>
</div>
