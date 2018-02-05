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

if (empty($dataSlide))
    return false;

if (is_array($dataSlide)) {
    foreach ($dataSlide as $key => $value) {
        if (empty($value)) {
            unset($dataSlide[ $key ]);
        }
    }
}

$alt = empty($alt) ? null : $alt;

?>

<?php if (is_array($dataSlide)): ?>

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

        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>

    </div>

<?php else: ?>

    <div class="jumbotron">
        <div class="container">
            <h1>Hello, world!</h1>

            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a
                starting point to create something more unique.</p>

            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>

        </div>
    </div>

<?php endif; ?>
