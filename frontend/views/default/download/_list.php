<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/6/15
 * Time: 15:24
 */

use yii\helpers\Url;
use yii\helpers\Html;

?>

<a href="<?= Url::to(['download/view', 'id' => $model->id]) ?>" title="<?= Html::encode($model->title) ?>">
    <?= Html::encode($model->title) ?>
</a>

<span><?= date('Y - m - d', $model->updated_at) ?></span>