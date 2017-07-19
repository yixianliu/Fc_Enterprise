<?php
/**
 *
 * 菜单模板
 *
 * Created by Yixianliu.
 * User: Yxl <zccem@163.com>
 * Date: 2017/6/6
 * Time: 21:51
 */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use app\models\Menu;

$result = Menu::view('A3');

/**
 *
 * 递归菜单
 *
 * @param $data
 * @return null|string|void
 */
function recursionMenu($data)
{
    if (empty($data) || !is_array($data)) {
        return '<h1>没有菜单数据 !!</h1>';
    }

    $html = null;

    foreach ($data as $value) {

        $html .= '<li class="">';
        $html .= '    <a href="index.html"><i class="fa fa-dashboard"></i><span class="title">' . $value['name'] . '</span></a>';

        $child = Menu::view($value['mkey']);

        if (empty($child)) {
            $html .= '<ul class="sub-menu">';
            $html .= '    <li>';
            $html .= '        <a href="index.html"><i class="fa fa-dashboard"></i><span class="title">' . $value['name'] . '</span></a>';
            $html .= '    </li>';
            $html .= '</ul>';
        }

        $html .= '</li>';
    }

    return $html;
}

?>

<ul class='wraplist'>

    <?php echo recursionMenu($result); ?>

</ul>