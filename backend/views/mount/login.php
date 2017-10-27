<?php
/**
 *
 * 登录模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/10/16
 * Time: 17:28
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\AppAsset;

AppAsset::register($this); // $this 代表视图对象

$this->beginPage();

?>

    <!DOCTYPE html>
    <html class=" ">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
        <meta charset="utf-8"/>
        <title>登录中心</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <?= Html::csrfMetaTags() ?>

        <?php $this->head() ?>

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" login_page">

    <?php $this->beginBody() ?>

    <div class="login-wrapper">
        <div id="login" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">

            <h1><a href="#" title="<?= Yii::$app->params['Conf']['NAME'] ?> - <?= Yii::$app->params['Conf']['TITLE'] ?>" tabindex="-1"><?= Yii::$app->params['Conf']['NAME'] ?>
                    - <?= Yii::$app->params['Conf']['TITLE'] ?></a></h1>

            <?php
            $form = ActiveForm::begin(['action' => ['mount/member/login'], 'method' => 'post', 'id' => $model->formName()]);
            ?>

            <p>
                <?=
                $form->field($model, 'username')->textInput(['class' => 'form-control', 'placeholder' => '帐号...'])
                    ->label('帐号');
                ?>
            </p>

            <p>
                <?=
                $form->field($model, 'password')->textInput(['class' => 'form-control', 'placeholder' => '密码....'])
                    ->label('密码');
                ?>
            </p>

            <p class="submit">
                <?= Html::submitButton('登录', ['class' => 'btn btn-primary btn-block']) ?>
            </p>

            <?php ActiveForm::end() ?>

            <?= Yii::$app->view->renderFile('@app/views/form_msg.php'); ?>

        </div>

    </div>

    <?php $this->endBody(); ?>

    </body>
    </html>

<?php $this->endPage() ?>