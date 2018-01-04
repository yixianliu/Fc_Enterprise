<?php
/**
 *
 * 幻灯片
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/4
 * Time: 15:51
 */

use yii\helpers\Url;
use yii\helpers\Html;
use common\models\Slide;

$ClsSlide = new Slide();

if (empty($pagekey))
    return false;

$dataSlide = $ClsSlide->getData($pagekey);

foreach ($dataSlide as $key => $value) {
    if (empty($value)) {
        unset($dataSlide[ $key ]);
    }
}

$alt = empty($alt) ? null : $alt;

?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">

        <?php foreach ($dataSlide as $value): ?>
            <div class="item active">
                <?= Html::img(Url::to('@web/../../backend/web/temp/slide/') . $value, ['class' => '', 'alt' => $alt]); ?>
            </div>
        <?php endforeach; ?>

    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
