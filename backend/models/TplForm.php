<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/6/6
 * Time: 10:31
 */

namespace backend\models;

use Yii;
use yii\base\Model;

class TplForm extends Model
{

    public $content = null;
    public $fileName = null;
    public $path = null;

    /**
     * 验证规则
     */
    public function rules()
    {
        return [
            [['content', 'path', 'fileName'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'content'  => '模板内容',
            'fileName' => '文件名',
            'path'     => '模板路径',
        ];
    }


    /**
     * 获取某个目录下所有文件
     *
     * @param      $path
     * @param bool $child
     *
     * @return array|null
     */
    public static function getFiles($path, $child = false)
    {
        $files = [];

        if (!$child) {

            if (is_dir( $path )) {
                $dp = dir( $path );
            } else {
                return null;
            }

            while ($file = $dp->read()) {
                if ($file != "." && $file != ".." && is_file( $path . $file )) {
                    $files[] = $file;
                }
            }
            $dp->close();

        } else {
            static::scanFiles( $files, $path );
        }

        return $files;
    }

    /**
     * 扫描目录
     *
     * @param      $files
     * @param      $path
     * @param bool $childDir
     */
    public static function scanFiles(&$files, $path, $childDir = false)
    {

        $dp = dir( $path );

        while ($file = $dp->read()) {
            if ($file != "." && $file != "..") {

                //当前为文件
                if (is_file( $path . $file )) {
                    $files[] = $file;
                } else {

                    // 当前为目录
                    static::scanFiles( $files[ $file ], $path . $file . DIRECTORY_SEPARATOR, $file );
                }
            }
        }

        $dp->close();
    }

}