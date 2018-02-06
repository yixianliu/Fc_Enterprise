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
            <?= Html::a(Html::encode($model->title), ['view', 'id' => $model->product_id], ['title' => $model->title]) ?>
        </p>
        <p></p>
        <p><?= Html::encode($model->user_id) ?></p>
    </dvi>

</li>