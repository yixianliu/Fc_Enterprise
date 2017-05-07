<?php

/**
 *  安装模板
 *
 *  @author Yxl <zccem@163.com>
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use app\components\iAjax\AjaxMsg;
?>

<style type="text/css">  
.mycheck {  
    width: 25px;  
    margin: 20px 100px;  
    position: relative;  
}  
.mycheck input[type=checkbox] {  
    visibility: hidden;  
}  
.mycheck label {  
    cursor: pointer;  
    position: absolute;  
    width: 25px;  
    height: 25px;  
    top: 0;  
    left: 0;  
    background: #fff;  
    border:2px solid #ccc;  
    -moz-border-radius: 3px;      /* Gecko browsers */  
    -webkit-border-radius: 3px;   /* Webkit browsers */  
    border-radius:3px;            /* W3C syntax */  
}  
.mycheck label:after {  
    opacity: 0;  
    content: '';  
    position: absolute;  
    width: 9px;  
    height: 5px;  
    background: transparent;  
    top: 6px;  
    left: 6px;  
    border: 2px solid #333;  
    border-top: none;  
    border-right: none;  
    -webkit-transform: rotate(-45deg);  
    -moz-transform: rotate(-45deg);  
    -o-transform: rotate(-45deg);  
    -ms-transform: rotate(-45deg);  
    transform: rotate(-45deg);  
}  
.mycheck label:hover::after {  
 opacity: 0.5;  
}  
.mycheck input[type=checkbox]:checked + label:after {  
    opacity: 1;  
}  
</style>  

<br />
<br />

<div class="jumbotron">

    <h1>准备开始安装 !!</h1>

    <br />
    <p class="lead">本次挂载,会重新安装程序,</p>

    <?php $form = ActiveForm::begin(['id' => $model->formName(), 'action' => ['Mount/run/install'], 'options' => ['class' => 'form-horizontal'], 'fieldConfig' => ['template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>", 'labelOptions' => ['class' => 'col-lg-1 control-label']]]); ?>

    <div class="mycheck">
         <label for="agreement">
            同意
        </label>
            <input type="checkbox" name="MountRunForm[agreement]" value="On" id="agreement" /> 
       
    </div>

    <br />
    <?= Html::submitButton('进行挂载 » »', ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>

    <?php ActiveForm::end(); ?>

    <div class="text-center">
        <?=
        AjaxMsg::widget(['config' => [
                'FormName' => $model->formName(),
                'Url' => Url::to(['Mount/center/view']),
        ]]);
        ?>
    </div>

</div>

<br />
<br />

<div class="row">

    <div class="col-lg-4">
        <h2>Safari bug warning!</h2>
        <p class="text-danger">As of v9.1.2, Safari exhibits a bug in which resizing your browser horizontally causes rendering errors in the justified nav that are cleared upon refreshing.</p>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
    </div>

    <div class="col-lg-4">
        <h2>后台管理</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
    </div>

    <div class="col-lg-4">
        <h2>前台管理</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
        <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
    </div>

</div>