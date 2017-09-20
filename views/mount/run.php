<?php

/**
 *  安装模板
 *
 * @author Yxl <zccem@163.com>
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use app\components\iAjax\AjaxMsg;

?>

<br/>
<br/>

<div class="jumbotron">

    <h1>准备开始安装 !!</h1>

    <br/>
    <p class="lead">本次挂载,会重新安装程序, 关于数据库内容也会清零, 但数据库表也会存在...</p>

    <p class="lead text-left">
        This will reinstall the program, the database content will be zero, but the database table will also exist...
    </p>

    <br/>
    <br/>

    <?php
    $form = ActiveForm::begin(
        [
            'id'      => $model->formName(),
            'action'  => ['Mount/run/install'],
            'options' => ['class' => 'form-horizontal'],

        ]
    );
    ?>

    <div>

        <?= $form->field($model, 'agreement')->checkbox(['class' => 'btn btn-primary', 'value' => 'On',])->label('同意'); ?>

        << <a href="#" style="font-size: 14px;">网站协议</a> >>

    </div>

    <br/>
    <?= Html::submitButton('进行挂载 » »', ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>

    <?php ActiveForm::end(); ?>

    <div class="text-center">
        <?=

        AjaxMsg::widget(
            [
                'config' => [
                    'Tpl'      => 'AjaxMsgMountTpl',
                    'FormName' => $model->formName(),
                    'FormUrl'      => Url::to(['Mount/center/view']),
                ],
            ]
        );

        ?>
    </div>

</div>

<br/>
<br/>

<div class="row">

    <div class="col-lg-4">
        <h2>Safari bug warning!</h2>
        <p class="text-danger">As of v9.1.2, Safari exhibits a bug in which resizing your browser horizontally causes
            rendering errors in the justified nav that are cleared upon refreshing.</p>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
            condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod.
            Donec sed odio dui. </p>
        <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
    </div>

    <div class="col-lg-4">
        <h2>后台管理</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
            condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod.
            Donec sed odio dui. </p>
        <p><a class="btn btn-primary" href="#" role="button">更多 »</a></p>
    </div>

    <div class="col-lg-4">
        <h2>前台管理</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta
            felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum
            massa.</p>
        <p><a class="btn btn-primary" href="#" role="button">更多 »</a></p>
    </div>

</div>