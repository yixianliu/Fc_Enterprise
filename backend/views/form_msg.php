<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/10/25
 * Time: 18:12
 */

use yii\bootstrap\Alert;

?>

<div class="col-md-12 col-sm-12 col-xs-12">
    <?php

    if (Yii::$app->getSession()->hasFlash('success')) {
        echo Alert::widget([
            'options' => [
                'class' => 'alert-success', //这里是提示框的class
            ],
            'body'    => Yii::$app->getSession()->getFlash('success'), //消息体
        ]);
    }

    if (Yii::$app->getSession()->hasFlash('error')) {
        echo Alert::widget([
            'options' => [
                'class' => 'alert alert-error alert-dismissible fade in',
            ],
            'body'    => Yii::$app->getSession()->getFlash('error'),
        ]);
    }

    ?>
</div>