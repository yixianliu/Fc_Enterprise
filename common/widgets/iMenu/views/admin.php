<?php

/**
 * @abstract iMenu UI
 * @author Yxl <zccem@163.com>
 */

use yii\helpers\Url;

$_SESSION['AdminSession']['url'] = empty($_SESSION['AdminSession']['url']) ? 'manager' : $_SESSION['AdminSession']['url'];

/**
 * 递归
 *
 * @param $child
 * @param $url
 * @param null $active
 * @return bool|string
 */
function recursiveIMenu($child, $url, $active = null)
{
    if (empty($child)) {
        return false;
    }

    $html = '<ul>';

    foreach ($child as $value) {

        $html .= '<li>';
        $html .= '  <a href="' . Url::to([$_SESSION['AdminSession']['url'] . '/' . $url . '/' . $value['url']]) . '">' . $value['name'] . '</a>';
        $html .= '</li>';

        if (!empty($value['Child'])) {
            $html .= recursiveIMenu($value['Child'], $value['url']);
        }
    }

    $html .= '</ul>';

    return $html;
}

?>

<ul class='wraplist'>

    <!-- 菜单列表 -->
    <?php foreach ($result as $key => $value): ?>

        <li class="open <?php if ($value['active'] == true): ?>active<?php endif; ?>">

            <a <?php if (!empty($value['Child'])): ?>href="javascript:" <?php else: ?>href="manager/<?= Url::to([$value['url']]); ?>" <?php endif; ?>title="<?= $value['name']; ?>"
               class="open">
                <i class="fa fa-dashboard"></i>
                <span class="title"><?= $value['name']; ?></span>
                <span class="arrow open"></span>
            </a>

            <?php if (!empty($value['Child'])): ?>

                <?= recursiveIMenu($value['Child'], $value['url']); ?>

            <?php endif; ?>

        </li>

    <?php endforeach; ?>

</ul>
