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

$result['classify'] = empty( $result['classify'] ) ? [] : $result['classify'];

?>

<div class="corre-classify">

    <span>相关分类：</span>

    <?php foreach ($result['classify'] as $value): ?>
        <a href="<?= Url::to( [Yii::$app->controller->action->id . '/index', 'id' => $value['c_key']] ) ?>" title="<?= $value['name'] ?>"><?= $value['name'] ?></a> /
    <?php endforeach; ?>

</div>
