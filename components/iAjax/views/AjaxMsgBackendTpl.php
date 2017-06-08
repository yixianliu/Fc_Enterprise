<?php
/**
 *
 * 后台返回信息模板
 *
 * Created by Yixianliu.
 * User: Yxl <zccem@163.com>
 * Date: 2017/6/8
 * Time: 10:14
 */

use yii\helpers\Html;
use yii\helpers\Url;

if (empty($result['FormName']) || empty($result['Url'])) {
    exit('插件异常 !!');
}

?>

<div id="SuccessMsg" class="alert alert-success alert-dismissible fade in" style="display: none;">
    <div class="close" onclick="closeMsg()">
        <span>×</span>
    </div>
    <strong>Success:</strong> Well done!
    <div class="form-text"></div>
</div>

<div id="ErrorMsg" class="alert alert-error alert-dismissible fade in" style="display: none;">
    <div class="close" onclick="closeMsg()">
        <span>×</span>
    </div>
    <strong>Danger:</strong> Oh snap!
    <div id="form-text"></div>
</div>

<script type="text/javascript">

    $(document).ready(function () {

        $("#<?= $result['FormName'] ?>").on('submit', function () {

            var form = $(this);
            var errorId = $("#ErrorMsg");
            var successId = $("#SuccessMsg");
            var fromtext = $("#form-text");

            form.find(':submit').attr('disabled', true);

            $.ajax({
                url: form.attr('action'),
                type: 'post',
                data: form.serialize(),
                dataType: 'json',

                // 错误
                error: function (XMLHttpRequest, textStatus, errorThrown) {

                    errorId.show();
                    fromtext.text('访问网络失败！' + errorThrown);
                    form.find(':submit').attr('disabled', false);
                    return false;
                },

                // 发送
                beforSend: function (data) {
                    form.find(':submit').attr('disabled', true);
                    return true;
                },

                // 成功
                success: function (data) {

                    if (data === true) {

                        successId.show();

                        var i = 4;

                        setInterval(function () {

                            if (i === 0) {
                                location.href = "<?= $result['Url']; ?>";
                            }

                            fromtext.text('操作成功,请稍候, 等待跳转 ' + i-- + '秒...');

                        }, 1000);

                    }

                    // error
                    else {
                        fromtext.text(data.msg);
                        form.find(':submit').attr('disabled', false);
                    }

                    return true;
                }

            });

            return true;
        });

    });

    function closeMsg() {
        $(this).parent("div").hide();
        return true;
    }
</script>