<?php
/**
 *
 * 模板管理
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/6/1
 * Time: 10:06
 */

namespace backend\controllers\admin;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * DownloadController implements the CRUD actions for Download model.
 */
class TplController extends BaseController
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

    public function actionIndex()
    {

        // 前台模板目录
        $dir = Yii::$app->basePath . '/../frontend/views/';

        // 获取文件
        $result = $this->getFiles($dir, true);

        return $this->render('/admin/center/tpl', ['result' => $result]);
    }

    /**
     * 获取某个目录下所有文件
     *
     * @param $path
     * @param bool $child
     * @return array|null
     */
    public function getFiles($path, $child = false)
    {
        $files = array();

        if (!$child) {
            if (is_dir($path)) {
                $dp = dir($path);
            } else {
                return null;
            }
            while ($file = $dp->read()) {
                if ($file != "." && $file != ".." && is_file($path . $file)) {
                    $files[] = $file;
                }
            }
            $dp->close();

        } else {
            $this->scanfiles($files, $path);
        }

        return $files;
    }

    /**
     * 扫描目录
     *
     * @param $files
     * @param $path
     * @param bool $childDir
     */
    public function scanfiles(&$files, $path, $childDir = false)
    {

        $dp = dir($path);

        while ($file = $dp->read()) {
            if ($file != "." && $file != "..") {
                if (is_file($path . $file)) {//当前为文件
                    $files[] = $file;
                } else {

                    // 当前为目录
                    $this->scanfiles($files[ $file ], $path . $file . DIRECTORY_SEPARATOR, $file);
                }
            }
        }

        $dp->close();
    }

}