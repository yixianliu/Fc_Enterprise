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
use yii\helpers\HtmlPurifier;

?>

<div class="col-md-4 col-xs-6 work-item web-design mockups">
    <div class="work-container">

        <div class="work-img">
            <img src="<?= Url::to('@web/themes/enterprise/img') ?>/project_1.jpg" alt="<?= Html::encode($model->title) ?>">
        </div>

        <div class="work-description">
            <h3>
                <?= Html::a(Html::encode($model->title), ['view', 'id' => $model->product_id]) ?>
            </h3>
        </div>

    </div>
</div>