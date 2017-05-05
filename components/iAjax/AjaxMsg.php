<?php

/**
 * @abstract 针对本程序的表单插件
 * @author Yxl <zccem@163.com>
 */

namespace app\components\iAjax;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\View;

class AjaxMsg extends Widget {

    public $config = array();

    /**
     * 运行
     *
     * @return boolean
     */
    public function run() {

        if (empty($this->config) || empty($this->config['FormName'])) {
            return FALSE;
        }

        $result['FormName'] = $this->config['FormName'];
        $result['Url'] = $this->config['Url'];

        return $this->render('AjaxMsgTpl', ['result' => $result]);
    }

}
