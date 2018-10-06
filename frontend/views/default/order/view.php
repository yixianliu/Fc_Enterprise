<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/9/29
 * Time: 9:20
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '确认订单';

?>

<?= $this->render( '../_slide' ); ?>

<div class="container content">

    <?= $this->render( '../_nav' ); ?>

    <div class="conY">

        <div class="conY_tit">订单详情</div>

        <div class="conY_text">

            <?php $form = ActiveForm::begin( ['action' => Url::to( ['create'] )] ); ?>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <colgroup>
                        <col class="col-xs-1">
                        <col class="col-xs-7">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">产品分类</th>
                        <td><?= $modelProduct->cls->name ?></td>
                    </tr>
                    <tr>
                        <th scope="row">产品名称</th>
                        <td><?= $modelProduct->title ?></td>
                    </tr>
                    <tr>
                        <th scope="row">产品价格</th>
                        <td><code><?= $modelProduct->price ?></code> 元</td>
                    </tr>
                    <tr>
                        <th scope="row">产品图片</th>
                        <td><img src="" width="150" height="150"/></td>
                    </tr>

                    <tr>
                        <th scope="row">产品内容</th>
                        <td><?= $modelProduct->content ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="form-group">

                <?= Html::submitButton( '确认付款', ['class' => 'btn btn-primary', 'id' => 'OrderSubmit'] ) ?>

                <?= Html::a( '取消订单', ['product/index'], ['class' => 'btn btn-primary'] ) ?>

            </div>

            <?php ActiveForm::end(); ?>

        </div>

        <div class="form-group">
            <p class="bg-primary" id="OrderMessage"></p>
        </div>

    </div>
</div>

<script type="text/javascript">

    $('#OrderSubmit').on('click', function () {

        var targetUrl = $("#w0").attr("action");

        var data = $("#w0").serialize();

        $.ajax({
            type: 'post',
            url: targetUrl,
            cache: false,
            data: data,
            dataType: 'json',
            success: function (data) {

                console.log(data);

                if (data.status == true) {
                    $(this).attr('disabled', 'disabled');
                }

                $('#OrderMessage').text(data.msg);

                return true;
            },
            error: function (data) {

                // console.log(data);
                alert("Ajax 异常 - " + data.responseText);
                return false;
            }
        });

        return false;
    });

</script>