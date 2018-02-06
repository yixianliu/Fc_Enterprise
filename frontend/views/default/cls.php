<?php
/**
 *
 * 分类模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/13
 * Time: 10:37
 */
use yii\helpers\Url;

$result['classify'] = empty($result['classify']) ? array() : $result['classify'];

$type = empty($type) ? 'supply' : $type;

?>

<div class="corre-classify">

    <span>相关分类：</span>

    <?php foreach ($result['classify'] as $value): ?>
        <a href="<?= Url::to([$type . '/index', 'id' => $value['c_key']]) ?>"><?= $value['name'] ?></a> /
    <?php endforeach; ?>

</div>
