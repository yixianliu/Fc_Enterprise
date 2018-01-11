<?php
/**
 *
 * 显示文件(文件 + 图片)模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/11
 * Time: 10:02
 */

use yii\helpers\Url;
use yii\helpers\Html;

$images = array();

// 取出图片
if (!empty($img)) {

    $imagesArray = explode(',', $img);

    foreach ($imagesArray as $value) {

        if (empty($value))
            break;

        $images[] = $value;
    }
}

?>

<div class="row">
    <div class="col-md-12">

        <?php if (!empty($images) && is_array($images)): ?>

            <?php foreach ($images as $value): ?>
                <div class="col-md-3 col-sm-6 col-xs-12">

                    <?php if ($type != 'pages' && $type != 'purchase'): ?>

                        <?= Html::img(Url::to('@web/temp/') . $type . '/' . $value, ['class' => 'img-responsive', 'width' => 180, 'height' => 100]); ?>

                    <?php else: ?>

                        <?= Html::img(Url::to('@web/../../Backend/web/themes/not.jpg'), ['class' => 'img-responsive', 'width' => 280, 'height' => 200]); ?>

                    <?php endif; ?>

                    <br />

                    <h6 style="word-wrap: break-word;"><a href="<?= Url::to('@web/../../Backend/web/temp/') . $type . DIRECTORY_SEPARATOR . $value ?>"><?= $value ?></a></h6><br/>

                </div>
            <?php endforeach ?>

        <?php else: ?>

            <h3>暂无相关内容 !!</h3>

        <?php endif ?>

    </div>
</div>
