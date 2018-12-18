<?php

if (empty( $url )) {
    return false;
}

?>

<div class="alert alert-info alert-dismissible fade in" style="display: none;" id="AjaxInfoDiv">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <strong>内容提示(Heads up!) : </strong>
    <div id="AjaxInfoMsg"></div>
</div>

<script type="text/javascript">

    // 批量复制
    $('#BatchCreate').on('click', function () {

        var url = '';

        // 获取选择的内容
        $.each($('input:checkbox:checked'), function () {

            var name = $(this).attr('name');

            if (name == 'id_all') {
                return;
            }

            url = $(this).val() + ',' + url;

        });

        $.ajax({

            type: "GET",
            url: "<?= $url ?>?id=" + url,
            dataType: "json",

            success: function (data) {
                $('#AjaxInfoDiv').show();
                $('#AjaxInfoMsg').text(data.msg);
                window.location.reload();
                return true;
            },

            error: function (data) {

            }

        });

        return true;
    });

    // 批量删除
    $('#BatchMovie').on('click', function () {

        var url = '';

        // 获取选择的内容
        $.each($('input:checkbox:checked'), function () {

            var name = $(this).attr('name');

            if (name == 'id_all') {
                return;
            }

            url = $(this).val() + ',' + url;

        });

        window.location.href = '<?= \yii\helpers\Url::to( ['batch-movie'] ) ?>?id=' + url;

        return false;
    });


</script>