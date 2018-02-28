<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/10
 * Time: 15:00
 */

use yii\helpers\Url;
use yii\helpers\Html;

?>

<li>
    <div class="list-img">
        <a href="<?= Url::to(['view', 'id' => $model->purchase_id]) ?>">
            <?= Html::img(Url::to('@web/themes/qijian/images/ser-left-1.jpg'), ['alt' => $model->title]); ?>
        </a>
    </div>

    <dvi class="list-cont">
        <p><span>￥</span> <?= Html::encode($model->price) ?></p>
        <p>
            <?= Html::a(Html::encode($model->title), ['view', 'id' => $model->purchase_id]) ?>
        </p>
        <p><?= Html::encode($model->user_id) ?></p>
        <p>
            <?php if ($model->is_type == 'Long'): ?>
                长期采购
            <?php else: ?>
                短期采购
            <?php endif; ?>
        </p>
    </dvi>
</li>