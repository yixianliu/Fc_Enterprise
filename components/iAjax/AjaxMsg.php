<?php

/**
 * @abstract 针对本程序的表单插件
 * @author   Yxl <zccem@163.com>
 */

namespace app\components\iAjax;

use yii\base\Widget;

class AjaxMsg extends Widget
{

    public $config = [];

    public function init()
    {

    }

    /**
     * 运行
     *
     * @return boolean
     */
    public function run()
    {

        if (empty($this->config) || empty($this->config['FormName']) || empty($this->config['FormUrl'])) {
            return false;
        }

        // 表单名称
        $result['FormName'] = $this->config['FormName'];

        // 跳转地址
        $result['FormUrl'] = $this->config['FormUrl'];

        if (empty($this->config['Tpl'])) {
            $Tpl = 'AjaxMsgMountTpl';
        } // 自定义模板
        else {
            $Tpl = $this->config['Tpl'];
        }

        return $this->render($Tpl, ['result' => $result]);
    }

}
