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

namespace frontend\controllers;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use common\models\Resume;
use common\models\SpOffer;
use common\models\UserSupply;
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
     * @param        $id
     * @param        $type
     * @param string $attribute
     *
     * @return string
     * @throws \yii\base\Exception
     */
    public function actionImageUpload($id = 1, $type, $attribute = 'images')
    {

        if (empty( $type )) {
            return Json::encode( ['message' => '参数有误 !!'] );
        }

        // 模型
        switch ($type) {

            // 招聘中心 (前台的招聘中心对应的就是简历模型)
            case 'job':
                $model = new Resume();
                break;

            // 商户资料
            case 'user':
                $model = new UserSupply();
                break;

            // 提交价格(前台能提交的内容只是提交价格)
            case 'purchase':
                $model = new SpOffer();
                break;

            default:
                return Json::encode( ['message' => '没有此模型 !!'] );
                break;
        }

        // 上传组件对应model
        $imageFile = UploadedFile::getInstance( $model, $attribute );

        // 初始化
        $ConfExt = static::WebConf( 'On' );

        // 格式
        if (empty( $ConfExt['IMAGE_UPLOAD_TYPE'] ) || !strpos( $ConfExt['IMAGE_UPLOAD_TYPE'], $imageFile->extension )) {
            return Json::encode( ['error' => 8003, 'success' => false, 'status' => false, 'message' => '上传格式有问题 !!'] );
        }

        // 上传路径 (物理路径)
        $directory = Yii::getAlias( '@frontend/web/temp/' ) . Yii::$app->user->identity->user_id . DIRECTORY_SEPARATOR . $id . DIRECTORY_SEPARATOR . $type;

        if (!is_dir( $directory ))
            FileHelper::createDirectory( $directory );

        if (!$imageFile)
            return Json::encode( ['status' => false, 'message' => '上传文件异常 !!'] );

        // 随机 Id 组成文件名
        $fileName = time() . '_' . $type . '_' . rand( 10000, 99999 ) . '.' . $imageFile->extension;

        // 路径
        $filePath = $directory . DIRECTORY_SEPARATOR . $fileName;

        if ($imageFile->saveAs( $filePath )) {

            $path = Yii::getAlias( '@web' ) . '/temp/' . DIRECTORY_SEPARATOR . Yii::$app->user->identity->user_id . DIRECTORY_SEPARATOR . $id . DIRECTORY_SEPARATOR . $type . DIRECTORY_SEPARATOR . $fileName;

            return Json::encode( [
                'files' => [
                    [
                        'name'         => $fileName,
                        'size'         => $imageFile->size,
                        'url'          => $path,
                        'thumbnailUrl' => $path,
                        'deleteUrl'    => Url::to( ['upload/image-delete', 'name' => $fileName, 'type' => $type] ),
                        'deleteType'   => 'GET',
                    ],
                ],
            ] );
        }

        return Json::encode( [
            'error' => 8003, 'success' => false, 'status' => false, 'message' => '上传失败 !!',
        ] );
    }

    /**
     * 删除
     *
     * @param $name
     * @param $type
     *
     * @return string
     */
    public function actionImageDelete($name, $type)
    {

        if (empty( $name ) || empty( $type )) {
            return Json::encode( ['message' => '参数有误 !!'] );
        }

        $directory = Yii::getAlias( '@frontend/web/temp/' ) . Yii::$app->user->identity->user_id . DIRECTORY_SEPARATOR . $type;

        if (is_file( $directory . DIRECTORY_SEPARATOR . $name )) {
            unlink( $directory . DIRECTORY_SEPARATOR . $name );
        }

        $files = FileHelper::findFiles( $directory );

        $output = [];

        foreach ($files as $file) {

            $fileName = basename( $file );
            $path = '/img/temp/' . $type . DIRECTORY_SEPARATOR . $fileName;

            $output['files'][] = [
                'name'         => $fileName,
                'size'         => filesize( $file ),
                'url'          => $path,
                'thumbnailUrl' => $path,
                'deleteUrl'    => Url::to( ['admin/upload/image-delete', 'name' => $fileName, 'type' => $type] ),
                'deleteType'   => 'GET',
            ];
        }

        return Json::encode( $output );
    }


}