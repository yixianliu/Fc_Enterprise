<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/6/11
 * Time: 17:13
 */


use yii\helpers\Url;

/**
 * 递归菜单
 *
 * @param $data
 *
 * @return null|string|void
 */
function recursionHtmlMenu($data)
{

    if (empty( $data ))
        return;

    $html = null;

    foreach ($data as $value) {

        if (empty( $value['name'] ))
            continue;

        $html .= '<li class="">';

        if (empty( $value['active'] ) || $value['active'] != 'On') {
            $html .= '    <a title="' . $value['name'] . '" href="' . Url::to( [ $value['url'] ] ) . '">' . $value['name'];
        } else {
            $html .= '    <a class="active" title="' . $value['name'] . '" title="' . $value['name'] . '">' . $value['name'];
        }

        if (!empty( $value['child'] )) {
            $html .= '<span class="caret"></span>';
        }

        $html .= '</a>';

        if (!empty( $value['child'] )) {
            $html .= '<ul class="sub-menu">';
            $html .= recursionHtmlMenu( $value['child'] );
            $html .= '</ul>';
        }

        $html .= '</li>';
    }

    return $html;
}

?>

<?php if (!empty( $result['menu'] )): ?>

<ul class='wraplist' title='<?= Yii::$app->view->params['ConfArray']['NAME'] ?>'>

    <?php foreach ($result['menu'] as $value): ?>

        <?php if (!empty( $value['name'] )): ?>

            <li class='<?php if (!empty( $value['open'] ) && $value['open'] == 'On'): ?>open<?php endif; ?>' title='<?= $value['name'] ?>'>

                <a title='<?= $value['name'] ?>' href='<?= Url::to( [ $value['url'] ] ) ?>' class='dropdown-toggle' <?php if (empty( $value['url'] )): ?>data-toggle='dropdown'<?php endif; ?>>

                    <?= $value['name'] ?>

                    <?php if (!empty( $value['child'] )): ?>
                        <span class='caret'></span>
                    <?php endif; ?>

                </a>

                <?php if (!empty( $value['child'] ) && is_array( $value['child'] )): ?>
                    <ul class='sub-menu'>
                        <?= recursionHtmlMenu( $value['child'] ) ?>
                    </ul>
                <?php endif; ?>

            </li>

        <?php endif; ?>

    <?php endforeach; ?>

<?php endif; ?>