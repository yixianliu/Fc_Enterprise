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
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Conf;

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
     * 上传文件
     *
     * @param string $id
     * @param        $type
     * @param        $ext
     * @param string $attribute
     *
     * @return string
     * @throws \yii\base\Exception
     */
    public function actionImageUpload($id = null, $type, $ext, $attribute = 'images')
    {

        if (empty($type) || empty($ext))
            return Json::encode(['error' => 8003, 'success' => false, 'status' => false, 'message' => '参数错误 !!']);

        switch ($type) {

            // 配置
            case 'conf':
                $model = new \common\models\Conf();
                break;

            // 新闻
            case 'news':
                $model = new \common\models\News();
                break;

            // 产品
            case 'product':
                $model = new \common\models\Product();
                break;

            // 幻灯片
            case 'slide':
                $model = new \common\models\Slide();
                break;

            // 简历中心
            case 'resume':
                $model = new \common\models\Resume();
                break;

            // 下载中心
            case 'download':
                $model = new \common\models\Download();
                break;

            // 招聘中心
            case 'job':
                $model = new \common\models\Job();
                break;

            // 采购中心
            case 'purchase':
                $model = new \common\models\Purchase();
                break;

            // 单页面
            case 'pages':
                $model = new \common\models\Pages();
                break;

            case 'pages-list':
                $model = new \common\models\PagesList();
                break;

            default:
                return Json::encode(['error' => 8003, 'success' => false, 'status' => false, 'message' => '没有此模型 !!',]);
                break;
        }

        // 上传组件对应model
        if (!($imageFile = UploadedFile::getInstance($model, $attribute)))
            return Json::encode(['error' => 8003, 'success' => false, 'status' => false, 'message' => '上传组件文件异常 !!']);

        // 验证后缀名
        if (!static::UploadExt($ext, $imageFile->extension))
            return Json::encode(['error' => 8003, 'success' => false, 'status' => false, 'message' => '上传格式有问题 !!']);

        // 上传路径
        $directory = Yii::getAlias('@backend/../frontend/web/temp') . DIRECTORY_SEPARATOR . $type . DIRECTORY_SEPARATOR . $id . DIRECTORY_SEPARATOR;

        if (!is_dir($directory))
            FileHelper::createDirectory($directory);

        $fileName = self::getRandomString() . '.' . $imageFile->extension;

        $filePath = $directory . $fileName;

        if ($imageFile->saveAs($filePath)) {

            $path = Yii::getAlias('@web/../../frontend/web/temp') . DIRECTORY_SEPARATOR . $type . DIRECTORY_SEPARATOR . $id . DIRECTORY_SEPARATOR . $fileName;

            return Json::encode([

                'files' => [
                    [
                        'name'         => $fileName,
                        'size'         => $imageFile->size,
                        'url'          => $path,
                        'thumbnailUrl' => $path,
                    ],
                ],
            ]);
        }

        return Json::encode(['error' => 8003, 'success' => false, 'status' => false, 'message' => '上传失败 !!']);
    }

    /**
     * 获取网站配置来判断后缀
     *
     * @param $ext
     * @param $fileExt
     *
     * @return array
     */
    public static function UploadExt($ext, $fileExt)
    {

        if (empty($ext) || empty($fileExt))
            return false;

        // 初始化
        $result = [];

        $confData = Conf::find()->where(['is_using' => 'On', 'is_language' => null])->asArray()->all();

        if (empty($confData))
            return false;

        foreach ($confData as $value) {
            $result[$value['c_key']] = $value['parameter'];
        }

        switch ($ext) {

            case 'image':

                if (empty($result['IMAGE_UPLOAD_TYPE']) || strpos($result['IMAGE_UPLOAD_TYPE'], $fileExt) === false) {
                    return false;
                }
                break;

            case 'file':

                if (empty($result['FILE_UPLOAD_TYPE']) || strpos($result['FILE_UPLOAD_TYPE'], $fileExt) === false) {
                    return false;
                }
                break;

            default:

                break;
        }

        return true;
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

        $directory = Yii::getAlias('@frontend/web/temp/') . Yii::$app->user->identity->user_id . DIRECTORY_SEPARATOR . $type;

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