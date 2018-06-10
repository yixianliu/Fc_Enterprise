<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/6/10
 * Time: 20:14
 */

use yii\helpers\Url;

/**
 * 递归菜单
 *
 * @param $data
 * @return null|string|void
 */
function recursionHtmlMenu($data)
{

    if (empty($data))
        return;

    $html = null;

    foreach ($data as $value) {

        if (empty($value['name']))
            continue;

        $html .= '<li class="dropdown">';
        $html .= '    <a title="' . $value['name'] . '" href="' . Url::to($value['url']) . '">' . $value['name'];

        if (!empty($value['child'])) {
            $html .= '<span class="caret"></span>';
        }

        $html .= '</a>';

        if (!empty($value['child'])) {
            $html .= '<ul class="dropdown-menu">';
            $html .= recursionHtmlMenu($value['child']);
            $html .= '</ul>';
        }

        $html .= '</li>';
    }

    return $html;
}

?>

<div id='navbar' class='navbar-collapse collapse'>
    <ul class='nav nav-pills' title='<?= $result['conf']['NAME'] ?>'>

        <?php foreach ($result['menu'] as $value): ?>

            <?php if (!empty($value['name'])): ?>

                <li class='dropdown' title='<?= $value['name'] ?>'>

                    <a title='<?= $value['name'] ?>' href='<?= Url::to($value['url']) ?>' class='dropdown-toggle' data-toggle='dropdown'>

                        <?= $value['name'] ?>

                        <?php if (!empty($value['child'])): ?>
                            <span class='caret'></span>
                        <?php endif; ?>

                    </a>

                    <?php if (!empty($value['child'])): ?>
                        <ul class='dropdown-menu'>
                            <?= recursionHtmlMenu($value['child']) ?>
                        </ul>
                    <?php endif; ?>

                </li>

            <?php endif; ?>

        <?php endforeach; ?>

    </ul>
</div>