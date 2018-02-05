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

<div>
    <a href="<?= Url::to(['news/view', 'id' => $model->news_id]) ?>" title="<?= Html::encode($model->title) ?>">
        <?= Html::encode($model->title) ?>
    </a>
    <span>2018.1.30</span>
</div>