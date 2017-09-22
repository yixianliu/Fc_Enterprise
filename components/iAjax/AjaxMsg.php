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

        // 初始化
        $result = array();

        // 表单名称
        $result['FormName'] = $this->config['FormName'];

        // 跳转地址
        $result['FormUrl'] = $this->config['FormUrl'];

        // 模板
        $this->config['Tpl'] = (empty($this->config['Tpl'])) ? 'AjaxMsgMountTpl' : $this->config['Tpl'];

        return $this->render($this->config['Tpl'], ['result' => $result]);
    }

}
