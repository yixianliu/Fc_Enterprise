<?php
/**
 *
 * 表单AJAX
 *
 * Created by Yixianliu.
 * User: Yxl <zccem@163.com>
 * Date: 2017/8/18
 * Time: 23:51
 */

namespace common\widgets\iForm;

use Yii;
use yii\widgets\InputWidget;

class FormMsg extends InputWidget
{

    public $config;

    public function run()
    {
        return $this->render('index');
    }
}