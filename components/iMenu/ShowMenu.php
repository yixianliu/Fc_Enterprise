<?php
/**
 *
 * 菜单插件
 *
 * Created by Yixianliu.
 * User: Yxl <zccem@163.com>
 * Date: 2017/6/20
 * Time: 11:02
 */

namespace app\components\iMenu;

use yii\base\Widget;
use app\models\Menu;

class ShowMenu extends Widget
{

    public $config = array();

    public static function ShowMenuData($fid)
    {

        if (empty($fid)) {
            return false;
        }

        $result = Menu::view($fid);

        foreach ($result as $key => $value) {
            $data[$key] = self::recursionMenu($value['mkey']);
        }

        return $data;
    }

    /**
     *
     * 递归菜单
     *
     * @param $fid
     */
    public static function recursionMenu($fid)
    {

        $result = Menu::findByMenu($fid);

        if (empty($result) || !is_array($result)) {
            return;
        }

        $resultData = [
            'label' => $result['name'],
            'url' => [
                $result['url']
            ]
        ];

        $childs = Menu::view($result['mkey']);

        if (!empty($childs) && is_array($childs)) {

            foreach ($childs as $key => $value) {
                $resultData['items'][$key] = self::recursionMenu($value['mkey']);
            }
        }

        return $resultData;
    }
}