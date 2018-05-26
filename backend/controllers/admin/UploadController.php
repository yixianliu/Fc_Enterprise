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

use common\models\Download;
use Yii;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use common\models\Product;
use common\models\Slide;
use common\models\Job;
use common\models\Purchase;
use common\models\Resume;
use common\models\Conf;
use common\models\Pages;
use common\models\PagesList;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SlideController implements the CRUD actions for Slide model.
 */
class UploadController extends BaseController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * 上传
     *
     * @param $id
     * @param $type
     * @param string $attribute
     * @return string
     * @throws \yii\base\Exception
     */
    public function actionImageUpload($id = 1, $type, $attribute = 'images')
    {

        if (empty($type)) {
            return Json::encode(['message' => '参数有误 !!']);
        }

        // 初始化
        $ext = array();

        switch ($type) {

            // 配置
            case 'conf':
                $model = new Conf();
                break;

            // 产品
            case 'product':
                $model = new Product();
                break;

            // 幻灯片
            case 'slide':
                $model = new Slide();
                break;

            // 简历中心
            case 'resume':
                $model = new Resume();
                break;

            // 简历中心
            case 'download':
                $model = new Download();
                break;

            // 招聘中心
            case 'job':
                $model = new Job();
                break;

            // 采购中心
            case 'purchase':
                $model = new Purchase();
                break;

            // 单页面
            case 'pages':
                $model = new Pages();
                break;

            case 'pages-list':
                $model = new PagesList();
                break;

            default:
                return Json::encode(['message' => '没有此模型 !!']);
                break;
        }

        // 上传组件对应model
        $imageFile = UploadedFile::getInstance($model, $attribute);

        // 判断上传格式
        if (!empty($ext)) {
            if (!in_array($imageFile->extension, $ext)) {
                return Json::encode(['status' => false, 'message' => '上传格式有问题 !!']);
            }
        }

        // 上传路径
        $directory = Yii::getAlias('@backend/web/temp') . DIRECTORY_SEPARATOR . $type . DIRECTORY_SEPARATOR;

        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        if (!$imageFile) {
            return Json::encode(['status' => false, 'message' => '上传文件异常 !!']);
        }

        $uid = time() . '_' . $type . '_' . rand(10000, 99999);
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

        return Json::encode(['status' => false, 'message' => '上传失败 !!']);
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