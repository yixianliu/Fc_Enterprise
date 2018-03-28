<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/3/28
 * Time: 17:06
 */

?>

<hr/>

<?=
FileUploadUI::widget([
    'model'         => $model,
    'attribute'     => 'path',
    'url'           => ['admin/upload/image-upload', 'id' => $model->id, 'type' => 'download', 'attribute' => 'path'],
    'gallery'       => false,
    'fieldOptions'  => [
        'accept' => 'file/*'
    ],
    'clientOptions' => [
        'maxFileSize'      => 2000000,
        'dataType'         => 'json',
        'maxNumberOfFiles' => 5,
    ],

    // ...
    'clientEvents'  => [

        'fileuploaddone' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                                
                                var html = "";
                                
                                var ImagesContent = $("#ImagesContent");
                                
                                $.each(data.result.files, function (index, file) {
                                    html += file.name + \',\';
                                });
                                
                                html += ImagesContent.val();
                                
                                ImagesContent.val(html);
                                
                                return true;
                            }',
        'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
    ],
]);
?>

<?= $form->field($model, 'path')->textarea(['id' => 'ImagesContent', 'style' => 'display:none;'])->label(false) ?>

<hr/>
