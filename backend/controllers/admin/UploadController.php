<?php
/**
 *
 * 上传控制器
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/12/8
 * Time: 15:15
 */

namespace backend\controllers\admin;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\helpers\Url;

/**
 * SlideController implements the CRUD actions for Slide model.
 */
class SlideController extends BaseController
{

    /**
     * 上传
     *
     * @return string
     */
    public function actionImageUpload($id)
    {
        $model = new Slide();

        // 上传组件对应model
        $imageFile = UploadedFile::getInstance($model, 'path');

        $directory = Yii::getAlias('@backend/web/temp') . DIRECTORY_SEPARATOR . 'Slide' . DIRECTORY_SEPARATOR;

        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        if ($imageFile) {

            $uid = time() . '_' . rand(00000, 99999);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;

            if ($imageFile->saveAs($filePath)) {

                $path = Yii::getAlias('@web') . '/temp/Slide' . DIRECTORY_SEPARATOR . $fileName;

                return Json::encode([
                    'files' => [
                        [
                            'name'         => $fileName,
                            'size'         => $imageFile->size,
                            'url'          => $path,
                            'thumbnailUrl' => $path,
                            'deleteUrl'    => Url::to(['admin/upload/image-delete', 'name' => $fileName]),
                            'deleteType'   => 'GET',
                        ],
                    ],
                ]);
            }
        }

        return Json::encode(['message' => '上传失败 !!']);
    }

    /**
     * 删除
     *
     * @param $name
     * @return mixed
     */
    public function actionImageDelete($name)
    {
        $directory = Yii::getAlias('@backend/web/temp/Slide');

        if (is_file($directory . DIRECTORY_SEPARATOR . $name)) {
            unlink($directory . DIRECTORY_SEPARATOR . $name);
        }

        $files = FileHelper::findFiles($directory);

        $output = [];

        foreach ($files as $file) {

            $fileName = basename($file);
            $path = '/img/temp/Slide' . DIRECTORY_SEPARATOR . $fileName;

            $output['files'][] = [
                'name'         => $fileName,
                'size'         => filesize($file),
                'url'          => $path,
                'thumbnailUrl' => $path,
                'deleteUrl'    => 'admin/upload/image-delete?name=' . $fileName,
                'deleteType'   => 'GET',
            ];
        }

        return Json::encode($output);
    }

    public function getPath() {

    }
}