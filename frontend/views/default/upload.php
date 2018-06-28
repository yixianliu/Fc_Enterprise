<?php
/**
 *
 * 前端上传插件整合
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/3/28
 * Time: 17:06
 */

use yii\helpers\Url;
use yii\helpers\Html;
use dosamigos\fileupload\FileUploadUI;

// 对应模型字段
$attribute = empty($attribute) ? 'path' : $attribute;

// Id为空的话,默认为用户Id
$id = empty($id) ? Yii::$app->user->identity->user_id : $id;

// 上传类型 (image, file)
$uploadType = empty($uploadType) ? 'image' : $uploadType;

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

$text = empty($text) ? '提供相关图片' : $text;

?>

<style type="text/css">
    .preview img {
        width: 180px;
        height: 100px;
    }
</style>

<hr/>

<div class="form-group">

    <?= $form->field($model, $attribute)->textInput(['style' => 'display:none;']) ?>

    <?=
    FileUploadUI::widget([
        'model'         => $model,
        'attribute'     => $attribute,
        'url'           => ['upload/image-upload', 'id' => $id, 'type' => Yii::$app->controller->id, 'attribute' => $attribute],
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
                                
                                if (data.result.error != "") {
                                    $("#UploadMessage").show().append(data.result.message);
                                }
                                return true;
                            }',

            'fileuploadfail' => 'function(e, data) {
            
                                console.log(e);
                                console.log(data);
                                
                                return false;
                            }',
        ],
    ]);
    ?>

    <?= $form->field($model, $attribute)->textInput(['id' => 'ImagesContent_' . $attribute, 'style' => 'display:none;'])->label(false) ?>

    <div class="row">
        <div class="col-md-12">
            <h5>
                <div id='UploadMessage' style='display: none;'><span class="label label-danger">错误</span>&nbsp;&nbsp;</div>
            </h5>
        </div>
    </div>

</div>

<hr/>

<div class="form-group">

    <?php if (!empty($images) && is_array($images)): ?>

        <div class="row">
            <?php foreach ($images as $value): ?>

                <div class="col-md-12">

                    <?php if (Yii::$app->controller->id != 'pages' && Yii::$app->controller->id != 'purchase' && Yii::$app->controller->id != 'sp-offer'): ?>

                        <?= Html::img(Url::to('@web/temp/') . Yii::$app->user->identity->user_id . '/' . $id . '/' . Yii::$app->controller->id . '/' . $value, ['width' => 350, 'height' => 150]); ?>

                    <?php elseif (Yii::$app->controller->id == 'sp-offer'): ?>

                        <?= Html::img(Url::to('@web/../../frontend/web/temp/') . Yii::$app->user->identity->user_id . '/sp_offer/' . $value, ['width' => 350, 'height' => 150]); ?>

                    <?php else: ?>

                        <?= Html::img(Url::to('@web/themes/not.jpg'), ['width' => 350, 'height' => 150]); ?>

                    <?php endif; ?>

                    <div class="portfolio-info" style="margin-top: 10px;margin-bottom: 10px;">

                        <?php if (Yii::$app->controller->id != 'sp-offer'): ?>
                            <a class="btn btn-danger DeleteImg" data-type="GET" data-url="">
                                <input class="DeleteImgHidden" type="hidden" value="<?= $value ?>"/><i class="glyphicon glyphicon-trash"></i> <font>删除</font>
                            </a>
                        <?php endif; ?>

                    </div>

                </div>

            <?php endforeach ?>

        </div>

        <script type="text/javascript">

            // 删除图片(并删除文件)
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
                    url: "<?= Url::to(['admin/upload/image-delete', 'type' => Yii::$app->controller->id]); ?>&name=" + DeleteImgText,
                    success: function (data) {

                    },
                    error: function (XMLHttpRequest, textStatus) {
                        console.log(XMLHttpRequest.status);
                        console.log(XMLHttpRequest.readyState);
                        console.log(textStatus);
                        return false;
                    }
                });

                ImageId.empty().attr('value', NewImageContent);

                $(this).parent('div').parent('div').hide();

                return true;
            });

        </script>

    <?php else: ?>

        <div class="row">
            <div class="col-md-12">
                <h3>暂无相关内容 !!</h3>
            </div>
        </div>

    <?php endif ?>

</div>

<hr/>
