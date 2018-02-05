<?php
/**
 *
 * 列表模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/12/19
 * Time: 16:12
 */

use yii\helpers\Url;
use yii\helpers\Html;

?>

<li>
    <div class="list-img">
        <a href="<?= Url::to(['view', 'id' => $model->product_id]) ?>">
            <?= Html::img(Url::to('@web/themes/qijian/images/ser-left-1.jpg'), ['alt' => $model->title]); ?>
        </a>
    </div>

    <dvi class="list-cont">
        <p><span>￥</span> <?= Html::encode($model->price) ?></p>
        <p>
            <a title="" href="<?= Html::a(Html::encode($model->title), ['view', 'id' => $model->product_id]) ?>"><?= Html::encode($model->title) ?></a>
        </p>
        <p><?= Html::encode($model->title) ?></p>
        <p><?= Html::encode($model->title) ?></p>
    </dvi>
</li>