<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/3/28
 * Time: 17:06
 */

use dosamigos\fileupload\FileUploadUI;

$attribute = empty($attribute) ? 'path' : $attribute;

$id = empty($id) ? 1 : $id;

// 上传类型
$uploadType = empty($type) ? 'image' : $type;

// 数量
$num = empty($num) ? 5 : $num;

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
    <?= $this->render('result_img', ['img' => $model->$attribute, 'type' => $type, 'attribute' => $attribute]); ?>
</div>

<hr/>