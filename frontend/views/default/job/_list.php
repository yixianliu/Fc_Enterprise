<?php
/**
 *
 * 列表方块模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/17
 * Time: 14:52
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>

<div>
    <a href="<?= Url::to(['job/view', 'id' => $model->job_id]) ?>" title="<?= Html::encode($model->title) ?>">
        <?= Html::encode($model->title) ?>
    </a>
    <span>2018.1.30</span>
</div>
