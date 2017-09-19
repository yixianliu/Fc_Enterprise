<?php

/**
 * @abstract Ajax
 * @author Yxl <zccem@163.com>
 */

use yii\helpers\Html;
use yii\helpers\Url;

if (empty($result['FormName']) || empty($result['Url'])) {

}
?>

<div class="row">
    <div class="col-md-12">

        <div class="error">
            <h4 id="form-text"></h4>
        </div>

        <div class="success">
            <h4 id="form-text"></h4>
        </div>

    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {

        $("#<?= $result['FormName'] ?>").on('submit', function () {

            var form = $(this);

            var fromtext = $("#form-text");

            form.find(':submit').attr('disabled', true);

            $.ajax({
                url: form.attr('action'),
                type: 'post',
                data: form.serialize(),
                dataType: 'json',

                // 错误
                error: function (XMLHttpRequest, textStatus, errorThrown) {

                    fromtext.text('访问网络失败！' + errorThrown);
                    form.find(':submit').attr('disabled', false);
                    return false;
                },

                // 发送
                beforSend: function (data) {
                    form.find(':submit').attr('disabled', true);
                },

                // 成功
                success: function (data) {

                    if (data === true) {

                        var i = 2;

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

                    return false;
                }

            });

            return false;

        });

    });
</script>

