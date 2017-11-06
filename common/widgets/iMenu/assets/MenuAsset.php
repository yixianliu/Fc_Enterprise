<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/10/16
 * Time: 15:40
 */

namespace common\widgets\iMenu\assets;

use yii\web\AssetBundle;

/**
 * @author Xianan Huang <xianan_huang@163.com>
 */
class MenuAsset extends AssetBundle
{
    public $css = [

    ];

    public $js = [
        'jquery.cookie.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];

    /**
     * 初始化：sourcePath赋值
     * @see \yii\web\AssetBundle::init()
     */
    public function init()
    {
        $this->sourcePath = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'statics';
    }
}