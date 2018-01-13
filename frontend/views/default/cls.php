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

<div class="row">
    <div class="col-md-12">
        <div class="portfolio-filter">
            <a href="#" class="filter active" data-filter="*">所有</a>

            <?php foreach ($result['classify'] as $value): ?>
                <a href="<?= Url::to([$type . '/index', 'type' => $value['c_key']]) ?>"><?= $value['name'] ?></a>
            <?php endforeach; ?>

        </div>
    </div>
</div>
