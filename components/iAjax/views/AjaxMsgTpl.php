
<?php

/**
 * @abstract Ajax
 * @author Yxl <zccem@163.com>
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="row">
    <div class="col-md-12">
        <h2 id="form-text" style="color: red;font-weight: 700;"></h2>
    </div>
</div>

<?php if (isset($result['FormName'])): ?>
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
                    beforSend: function (data) {
                        form.find(':submit').attr('disabled', true);
                    },

                    // 成功
                    success: function (data) {

                        if (data === true) {

                            var i = 4;

                            setInterval(function () {

                                if (i === 0) {
                                    location.href = "<?= $result['Url']; ?>";
                                }

                                fromtext.text('登录成功,请稍候, 等待跳转 ' + i-- + '秒...');

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
<?php else: ?>

    <div class="row">
        <div class="col-md-12">
            <h1>插件异常 !!</h1>
        </div>
    </div>

<?php endif; ?>

