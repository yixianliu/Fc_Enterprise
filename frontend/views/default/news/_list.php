<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/3
 * Time: 11:20
 */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

?>

<div class="col-md-3 col-sm-4 col-xs-6 work-item web-design mockups">
    <div class="work-container">
        <div class="work-img">

            <a href="<?= Url::to(['news/view', 'id' => $model->news_id]) ?>" title="<?= Html::encode($model->title) ?>">
                <?= Html::img(Url::to('@web/themes/enterprise/img/project_1.jpg'), ['alt' => Html::encode($model->title), 'class' => '']); ?>
            </a>

        </div>
        <div class="work-description">
            <h3><a href="portfolio-single.html" title="<?= Html::encode($model->title) ?>"><?= Html::encode($model->title) ?></a></h3>
            <span><a href="#">Print</a></span>
        </div>
    </div>
</div>
