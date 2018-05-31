<?php
/**
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
        'url'           => ['upload/image-upload', 'id' => $id, 'type' => $type, 'attribute' => $attribute],
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

        <div class="col-md-12 col-sm-12 col-xs-12 ">

            <?php foreach ($images as $value): ?>
                <div class="col-md-4 col-sm-6 col-xs-12">

                    <?php if ($type != 'pages' && $type != 'purchase' && $type != 'sp-offer' && $type != 'user_supply'): ?>

                        <?= Html::img(Url::to('@web/temp/') . $type . '/' . $value, ['class' => 'img-responsive', 'width' => 280, 'height' => 200]); ?>

                    <?php elseif ($type == 'user_supply'): ?>

                        <?= Html::img(Url::to('@web/temp/') . $id . '/' . $type . '/' . $value, ['class' => 'img-responsive', 'width' => 280, 'height' => 200]); ?>

                    <?php elseif ($type == 'sp-offer'): ?>

                        <?= Html::img(Url::to('@web/../../frontend/web/temp/') . $user_id . '/sp_offer/' . $value, ['class' => 'img-responsive', 'width' => 280, 'height' => 200]); ?>

                    <?php else: ?>

                        <?= Html::img(Url::to('@web/themes/not.jpg'), ['class' => 'img-responsive', 'width' => 280, 'height' => 200]); ?>

                    <?php endif; ?>

                    <div class="portfolio-info">

                        <h5 class="deleteH5" style="word-wrap: break-word;"><?= $value ?></h5><br/>

                        <?php if ($type != 'sp-offer'): ?>

                            <button class="btn btn-danger delete" data-type="GET" data-url="<?= Url::to(['admin/upload/image-delete', 'name' => $value, 'type' => $type]); ?>">
                                <i class="glyphicon glyphicon-trash"></i>
                                <span>删除</span>
                            </button>

                        <?php endif; ?>

                    </div>

                    <hr/>

                </div>

            <?php endforeach ?>

        </div>

        <script type="text/javascript">

            $('.portfolio-info').on('click', function () {

                var h5 = $(this).find('.deleteH5').text();

                // 获取 ID
                var ImageId = $('#ImagesContent');

                var imgArray = ImageId.html().split(',');

                // 重新处理
                var NewImageContent = '';

                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i] == h5 || imgArray[i] == '') {
                        continue;
                    }
                    NewImageContent += imgArray[i] + ',';
                }

                ImageId.empty().html(NewImageContent);

                $(this).parent('div').hide();

                return true;
            });

        </script>

    <?php else: ?>

        <h3>暂无相关内容 !!</h3>

    <?php endif ?>

</div>

<hr/>
