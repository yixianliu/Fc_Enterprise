<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/3
 * Time: 11:20
 */

use yii\helpers\Url;
use yii\helpers\Html;

?>

<a href="<?= Url::to(['news/view', 'id' => $model->news_id]) ?>" title="<?= Html::encode($model->title) ?>">
    <?= Html::encode($model->title) ?>
</a>
<span><?= date('Y - m - d', $model->updated_at) ?></span>