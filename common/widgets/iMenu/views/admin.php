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
function recursiveIMenu($child, $url = null)
{
    if (empty($child)) {
        return false;
    }

    $html = '<ul class="sub-menu">';
    foreach ($child as $value) {
        $html .= '<li>';
        $html .= '    <a href="' . Url::to([$url . '/' . $value['url']]) . '">' . $value['name'] . '</a>';
        $html .= '</li>';

        if (!empty($value['Child'])) {
            $html .= recursiveIMenu($value['Child'], $value['itemRp']['name']);
        }
    }
    $html .= '</ul>';

    return $html;
}

?>

<ul class='wraplist'>

    <!-- 菜单列表 -->
    <?php foreach ($result as $key => $value): ?>

        <li class="">

            <a href="<?php if (!empty($value['Child'])): ?> # <?php else: ?> <?= Url::to([$value['url']]); ?> <?php endif; ?>"
               title="<?= $value['name']; ?>">

                <i class="fa fa-dashboard"></i>
                <span class="title"><?= $value['name']; ?></span>
                <span class="arrow open"></span>
            </a>

            <?php if (!empty($value['Child'])): ?>

                <?= recursiveIMenu($value['Child'], $value['itemRp']['name']); ?>

            <?php endif; ?>

        </li>

    <?php endforeach; ?>

</ul>
