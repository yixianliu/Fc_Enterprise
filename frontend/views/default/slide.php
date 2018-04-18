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

        if (empty($value))
            unset($dataSlide[ $key ]);

    }
}

$alt = empty($alt) ? null : $alt;

?>

<?php if (is_array($dataSlide)): ?>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <?php if (count($dataSlide) > 1): ?>
            <ol class="carousel-indicators">

                <?php foreach ($dataSlide as $key => $value): ?>
                    <li data-target="#myCarousel" data-slide-to="<?= $key ?>" class="<?php if ($key == 0): ?>active<?php endif; ?>"></li>
                <?php endforeach; ?>

            </ol>
        <?php endif; ?>

        <div class="carousel-inner">

            <?php foreach ($dataSlide as $key => $value): ?>

                <div class="item <?php if ($key == 0): ?>active<?php endif; ?>">
                    <?= Html::img(Url::to('@web/../../backend/web/temp/slide/') . $value, ['class' => '', 'alt' => $alt]); ?>
                </div>

            <?php endforeach; ?>

        </div>

        <?php if (count($dataSlide) > 1): ?>
            <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
        <?php endif; ?>

    </div>

<?php endif; ?>
