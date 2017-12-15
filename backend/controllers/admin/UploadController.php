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

use common\models\Job;
use Yii;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use common\models\Product;
use common\models\Slide;

/**
 * SlideController implements the CRUD actions for Slide model.
 */
class UploadController extends BaseController
{

    /**
     * 上传
     *
     * @param $id
     * @param $type
     * @param string $attribute
     * @return string
     * @throws \yii\base\Exception
     */
    public function actionImageUpload($id, $type, $attribute = 'images')
    {

        if (empty($id) || empty($type)) {
            return Json::encode(['message' => '参数有误 !!']);
        }

        switch ($type) {

            case 'product':
                $model = new Product();
                break;

            case 'slide':
                $model = new Slide();
                break;

            case 'job':
                $model = new Job();
                break;

            default:
                return Json::encode(['message' => '没有此模型 !!']);
                break;
        }

        // 上传组件对应model
        $imageFile = UploadedFile::getInstance($model, $attribute);

        // 上传路径
        $directory = Yii::getAlias('@backend/web/temp') . DIRECTORY_SEPARATOR . $type . DIRECTORY_SEPARATOR;

        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        if (!$imageFile) {
            return Json::encode(['message' => '上传文件失败 !!']);
        }

        $uid = time() . '_' . rand(00000, 99999);
        $fileName = $uid . '.' . $imageFile->extension;
        $filePath = $directory . $fileName;

        if ($imageFile->saveAs($filePath)) {

            $path = Yii::getAlias('@web') . '/temp/' . $type . DIRECTORY_SEPARATOR . $fileName;

            return Json::encode([
                'files' => [
                    [
                        'name'         => $fileName,
                        'size'         => $imageFile->size,
                        'url'          => $path,
                        'thumbnailUrl' => $path,
                        'deleteUrl'    => Url::to(['admin/upload/image-delete', 'name' => $fileName, 'type' => $type]),
                        'deleteType'   => 'GET',
                    ],
                ],
            ]);
        }

        return Json::encode(['message' => '上传失败 !!']);
    }

    /**
     * 删除
     *
     * @param $name
     * @param $type
     * @return string
     */
    public function actionImageDelete($name, $type)
    {

        if (empty($name) || empty($type)) {
            return Json::encode(['message' => '参数有误 !!']);
        }

        $directory = Yii::getAlias('@backend/web/temp/') . $type;

        if (is_file($directory . DIRECTORY_SEPARATOR . $name)) {
            unlink($directory . DIRECTORY_SEPARATOR . $name);
        }

        $files = FileHelper::findFiles($directory);

        $output = [];

        foreach ($files as $file) {

            $fileName = basename($file);
            $path = '/img/temp/' . $type . DIRECTORY_SEPARATOR . $fileName;

            $output['files'][] = [
                'name'         => $fileName,
                'size'         => filesize($file),
                'url'          => $path,
                'thumbnailUrl' => $path,
                'deleteUrl'    => Url::to(['admin/upload/image-delete', 'name' => $fileName, 'type' => $type]),
                'deleteType'   => 'GET',
            ];
        }

        return Json::encode($output);
    }

}