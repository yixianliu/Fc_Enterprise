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

<div class="col-md-3 col-sm-4 col-xs-6 work-item web-design mockups">
    <div class="work-container">
        <div class="work-img">

            <a href="<?= Url::to(['job/view', 'id' => $model->job_id]) ?>" title="<?= Html::encode($model->title) ?>">
                <?= Html::img(Url::to('@web/themes/enterprise/img/project_1.jpg'), ['alt' => Html::encode($model->title), 'class' => '']); ?>
            </a>

        </div>
        <div class="work-description">
            <h3><a href="<?= Url::to(['job/view', 'id' => $model->job_id]) ?>" title="<?= Html::encode($model->title) ?>"><?= Html::encode($model->title) ?></a></h3>
            <span><a href="#">Print</a></span>
        </div>
    </div>
</div>

