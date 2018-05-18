<?php
/**
 *
 * 上传整合组件
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/3/28
 * Time: 17:06
 */

use yii\helpers\Url;
use yii\helpers\Html;
use dosamigos\fileupload\FileUploadUI;

$attribute = empty($attribute) ? 'path' : $attribute;

$id = empty($id) ? 1 : $id;

// 上传类型
$uploadType = empty($type) ? 'image' : $type;

// 数量
$num = empty($num) ? 5 : $num;

// 初始化
$images = array();

// 取出图片
if (!empty($model->$attribute)) {

    $imagesArray = explode(',', $model->$attribute);

    foreach ($imagesArray as $value) {

        if (empty($value))
            break;

        $images[] = $value;
    }
}

$text = empty($text) ? '没有描述' : $text;

?>

<style type="text/css">
    .preview img {
        width: 180px;
        height: 100px;
    }
</style>

<hr/>

<div class="form-group">

    <label><?= $text ?></label>

    <?=
    FileUploadUI::widget([
        'model'         => $model,
        'attribute'     => $attribute,
        'url'           => ['admin/upload/image-upload', 'id' => $id, 'type' => $type, 'attribute' => $attribute],
        'gallery'       => false,
        'fieldOptions'  => [
            'accept' => $uploadType . '/*'
        ],
        'clientOptions' => [
            'maxFileSize'      => 2000000,
            'dataType'         => 'json',
            'maxNumberOfFiles' => $num,
        ],

        // ...
        'clientEvents'  => [

            'fileuploaddone' => 'function(e, data) {
            
                                console.log(e);
                                console.log(data);
                                
                                var ImagesContent = $("#ImagesContent_' . $attribute . '");
                                
                                var num = ' . $num . ';
                                
                                var html = "";
                                
                                if (num > 1) {
                                
                                    $.each(data.result.files, function (index, file) {
                                        html += file.name + \',\';
                                    });
                                    
                                    html += ImagesContent.val();
                                    
                                } else {
                                    html = data.result.files[0].name;
                                }
                                
                                ImagesContent.attr("value", html);
                      
                                return true;
                            }',
            'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
        ],
    ]);
    ?>

    <?= $form->field($model, $attribute)->textInput(['id' => 'ImagesContent_' . $attribute, 'style' => 'display:none;'])->label(false) ?>

</div>

<hr/>

<div class="form-group">

    <?php if (!empty($images) && is_array($images)): ?>

        <div class="row">
            <?php foreach ($images as $value): ?>

                <div class="col-md-3">

                    <?php if ($type != 'pages' && $type != 'purchase' && $type != 'sp-offer'): ?>

                        <?= Html::img(Url::to('@web/temp/') . $type . '/' . $value, ['width' => 350, 'height' => 150]); ?>

                    <?php elseif ($type == 'sp-offer'): ?>

                        <?= Html::img(Url::to('@web/../../frontend/web/temp/') . $user_id . '/sp_offer/' . $value, ['width' => 350, 'height' => 150]); ?>

                    <?php else: ?>

                        <?= Html::img(Url::to('@web/themes/not.jpg'), ['width' => 350, 'height' => 150]); ?>

                    <?php endif; ?>

                    <div class="portfolio-info" style="margin-top: 10px;margin-bottom: 10px;">

                        <?php if ($type != 'sp-offer'): ?>
                            <a class="btn btn-danger DeleteImg" data-type="GET" data-url="">
                                <input class="DeleteImgHidden" type="hidden" value="<?= $value ?>"/><i class="glyphicon glyphicon-trash"></i> <font>删除</font>
                            </a>
                        <?php endif; ?>

                    </div>

                </div>

            <?php endforeach ?>

        </div>

        <script type="text/javascript">

            $('.DeleteImg').on('click', function () {

                var DeleteImgText = $(this).find('.DeleteImgHidden').val();

                // 获取 ID
                var ImageId = $('#ImagesContent_<?= $attribute ?>');

                var imgArray = ImageId.val().split(',');

                // 重新处理
                var NewImageContent = '';

                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i] == DeleteImgText || imgArray[i] == '') {
                        continue;
                    }
                    NewImageContent += imgArray[i] + ',';
                }

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "<?= Url::to(['admin/upload/image-delete', 'type' => $type]); ?>&name=" + DeleteImgText,
                    success: function (data) {

                    },
                    error: function (XMLHttpRequest, textStatus) {
                        alert(XMLHttpRequest.status);
                        alert(XMLHttpRequest.readyState);
                        alert(textStatus);
                        return false;
                    }
                });

                ImageId.empty().attr('value', NewImageContent);

                $(this).parent('div').parent('div').hide();

                return true;
            });

        </script>

    <?php else: ?>

        <h3>暂无相关内容 !!</h3>

    <?php endif ?>

</div>
<hr/>
