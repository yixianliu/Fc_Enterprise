<?php
/**
 *
 * 调用样式
 *
 * Created by Yixianliu.
 * User: Yxl <zccem@163.com>
 * Date: 2017/8/19
 * Time: 0:42
 */

namespace common\widgets\iForm\assets;

use Yii;
use yii\web\AssetBundle;

class FileUploadAsset extends AssetBundle
{

    public $css
        = [
            'webuploader.css',
        ];

    public $js
        = [
            'webuploader.js',
        ];

    public $depends
        = [
            'yii\web\YiiAsset',
        ];

    /**
     * 初始化：sourcePath赋值
     *
     * @see \yii\web\AssetBundle::init()
     */
    public function init()
    {
        $this->sourcePath = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'statics';
    }

}