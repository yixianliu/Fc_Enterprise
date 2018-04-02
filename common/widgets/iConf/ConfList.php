<?php
/**
 *
 * 网站配置组件
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/11/11
 * Time: 9:41
 */

namespace common\widgets\iConf;

use common\models\Menu;
use Yii;
use yii\widgets\InputWidget;
use common\models\Conf;

class ConfList extends InputWidget
{

    public $config = array();

    public function init()
    {
        return;
    }

    /**
     * 执行
     *
     * @return bool|string|void
     */
    public function run()
    {

        // 初始化
        $result = array();

        $result['title'] = (empty($this->config[0]) ? '没有标题' : $this->config[0]);

        $confData = Conf::findByData('On');

        if (!empty($confData)) {
            foreach ($confData as $key => $value) {
                $result['Conf'][ $value['c_key'] ] = $value['parameter'];
            }
        }

        $result['code'] = Conf::findOne(['c_key' => 'CODE_IMG'])->toArray();

        $this->config[1] = empty($this->config[1]) ? 'head' : $this->config[1];

        // 底部菜单链接
        if ($this->config[1] == 'foot')
        {
            $result['footArray'] = Menu::findByAll('E1', 'cn');
        }

        return $this->render($this->config[1], [
            'result' => $result
        ]);
    }

    public function footArray()
    {

    }
}