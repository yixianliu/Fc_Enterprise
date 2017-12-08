<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2017/12/8
 * Time: 15:34
 */

?>


<div class="content-body">
    <div class="row">

        <?php if (!empty($result['img']) && is_array($result['img'])): ?>

            <div class="col-md-12 col-sm-12 col-xs-12">

                <?php foreach ($result['img'] as $value): ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">

                        <?= Html::img(Url::to('@web/temp/Slide/') . $value, ['class' => 'img-responsive', 'width' => 400, 'height' => 100]); ?>

                        <div class="portfolio-info animated fadeInUp animated-duration-600ms">
                            <h5><?= $value ?></h5>
                            <a class="preview" href="<?= Url::to(['admin/upload/image-delete', 'name' => $value]); ?>" rel="prettyPhoto">删除</a>

                            <button class="btn btn-danger delete" data-type="GET" data-url="<?= Url::to(['admin/upload/image-delete', 'name' => $value]); ?>">
                                <i class="glyphicon glyphicon-trash"></i>
                                <span>删除</span>
                            </button>

                        </div>

                        <input type='hidden' class='<?= $value ?>' name='Slide[path][]' value='<?= $value ?>'>

                    </div>
                <?php endforeach ?>

            </div>

        <?php else: ?>

        <h3>暂无相关图片 !!</h3>

        <?php endif ?>

    </div>
</div>