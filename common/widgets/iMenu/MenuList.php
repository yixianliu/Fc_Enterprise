<?php

/**
 * @abstract 针对本程序的菜单插件
 * @author Yxl <zccem@163.com>
 */

namespace common\widgets\iMenu;

use Yii;
use yii\widgets\InputWidget;
use common\models\Menu;
use common\widgets\iMenu\assets\MenuAsset;

class MenuList extends InputWidget
{

    // 菜单ID
    public $config = null;

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

        if (empty($this->config)) {
            return false;
        }

        MenuAsset::register($this->view);

        // 获取GET mid
        $Mid = Yii::$app->request->get('mid');
        $activeMid = empty($Mid) ? 'AC2' : $Mid;

        // 查找一级目录
        $data = Menu::findByData($this->config['m_key']);

        if (empty($data)) {
            return;
        }

        // 循环获取一级目录
        foreach ($data as $key => $value) {

            $Menu[ $key ] = $this->recursive($value['m_key']);

            // 当前菜单
            $Menu[ $key ]['active'] = ($activeMid == $value['m_key']) ? true : false;
        }

        // 模板
        $this->config['tpl'] = empty($this->config['tpl']) ? 'index' : $this->config['tpl'];

        return $this->render($this->config['tpl'], ['result' => $Menu]);
    }

    /**
     * 递归
     *
     * @param $pid
     * @return array|bool|null|void|\yii\db\ActiveRecord|\yii\db\ActiveRecord[]
     */
    public function recursive($pid)
    {
        if (empty($pid)) {
            return false;
        }

        $result = Menu::findByOne($pid);

        if (empty($result)) {
            return;
        }

        $data = Menu::findByData($pid);

        foreach ($data as $key => $value) {
            $result['Child'][] = $this->recursive($value['m_key']);
        }

        return $result;
    }

}
