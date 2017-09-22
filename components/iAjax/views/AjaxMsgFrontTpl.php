<div id="successform" class="alert alert-success" style="display: none;">
    <i class="icon-gift"></i><strong>执行成功 !!</strong> <span id="formMsgText"></span>
</div>

<div id="errorform" class="alert alert-danger" style="display: none;">
    <i class="icon-remove-sign"></i><strong>执行错误 !!</strong> <span id="formMsgText"></span>
</div>

<script type="text/javascript">

    $('#closemsg').on('click', function () {
        $('#errorform').hide();
    });

    $('#<?= $result['FormName']; ?>').on('submit', function () {

        var form = $(this);

        // 错误消息
        var errormsg = $('#errorform');

        // 成功消息
        var successmsg = $('#successform');

        // 获取 Input
        form.find(':submit').attr('disabled', true);

        jQuery.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            dataType: 'JSON',
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                errormsg.show().find('#formMsgText').text(errorThrown);
                form.find(':submit').attr('disabled', false);
                return false;
            },

            // 执行成功
            success: function (data) {

                if (data.status == true) {

                    successmsg.show().find('#formMsgText').html(data.msg);

                    var i = 2;
                    setInterval(function () {
                        if (i == 0) {
                            location.href = "<?= $result['FormUrl']; ?>";
                        }
                    }, 1000);
                    errormsg.hide();

                    return true;
                }

                // error
                else {

                    var html = '<div>';
                    for (var key in data) {
                        html += '<div>' + data[key] + '</div>';
                    }
                    html += '</div>';

                    errormsg.show().find('#formMsgText').html(html);
                    form.find(':submit').attr('disabled', false);
                    successmsg.hide();
                }

                return false;
            }
        });

        return false;
    });
</script>
