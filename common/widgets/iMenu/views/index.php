<?php

/**
 * @abstract iMenu UI
 * @author Yxl <zccem@163.com>
 */

use yii\helpers\Url;

?>

<?php foreach ($result as $key => $value): ?>
    <div class="has-submenu" style="vertical-align: middle;">

        <?php if (!empty($value['Child'])): ?>

            <a class="menu-item show-submenu" id="Menu_<?= $value['m_key']; ?>" href="#" title="<?= $value['name']; ?>" alt="<?= $value['name']; ?>">
                <i class="bg-red-dark fa fa-home"></i>
                <em><?= $value['name']; ?></em>
                <strong>6</strong>
            </a>

        <?php else: ?>
            <a class="menu-item" href="<?= Url::to([$value['url']]); ?>" title="<?= $value['name']; ?>" alt="<?= $value['name']; ?>">
                <i class="bg-red-dark fa fa-home"></i>
                <em><?= $value['name']; ?></em>
                <strong>6</strong>
            </a>
        <?php endif; ?>

        <?php if (!empty($result[ $key ]['Child'])): ?>
            <div class="submenu" id="Menu_<?= $value['url']; ?>_Child" style="vertical-align: middle;">

                <?php foreach ($result[ $key ]['Child'] as $values): ?>

                    <a class="submenu-item submenu-item-active" href="<?= Url::to([$values['url']]); ?>" title="<?= $values['name']; ?>" alt="<?= $values['name']; ?>">
                        <i class="fa fa-angle-right"></i><em><?= $values['name']; ?></em>
                        <i class="fa fa-circle"></i>
                    </a>

                <?php endforeach; ?>

            </div>
        <?php endif; ?>

    </div>
<?php endforeach; ?>

<script type="text/javascript">


</script>
