<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/2/6
 * Time: 16:57
 */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = '采购平台';

// $this->registerJsFile('@web/themes/qijian/js/jquery1.42.min.js');
// $this->registerJsFile('@web/themes/qijian/js/jquery.SuperSlide.2.1.1.js');

?>

<?=Html::cssFile('@web/themes/qijian/css/nav.css')?>

<!-- 商城分类插件
<?=Html::jsFile('@web/themes/qijian/js/jquery1.42.min.js')?>

<?=Html::jsFile('@web/themes/qijian/js/jquery.SuperSlide.2.1.1.js')?>
 -->

<!-- 文字上下滚动 -->
<?=Html::jsFile('@web/themes/qijian/js/scroll.js')?>

<script type="text/javascript">
    $(function(){
        slides(0);
        myScrolls(0);
    });
</script>

<div class="container-fluid classfi-bg">
    <div class="container shop-classfiy">
        <?= $this->render('_cls', ['result' => $result]); ?>
    </div>
</div>

<?= $this->render('../slide', ['pagekey' => 'purchase']); ?>

<!-- 数据 -->
<div class="container-fluid pur-data">
    <div class="container">

        <!-- 采购列表 -->
        <div class="data-list">

            <div class="left">
                <?= Html::img(Url::to('@web/themes/qijian/images/tender-1.jpg'), ['alt' => $this->title]); ?>
            </div>

            <div class="right">

                <div class="data-right-title">

                    <div class="data-title-left">采购寻源</div>

                    <div class="data-title-right">
                        <a title="" href="<?= Url::to(['/purchase/index']) ?>">更多 >>></a>
                    </div>

                </div>

                <div class="data-right-list">

                    <?php if (!empty($result['result'])): ?>

                        <?php foreach ($result['result'] as $value): ?>
                            <div>
                                <ul>
                                    <li>【采购】</li>
                                    <li><?= $value['title'] ?></li>
                                    <li>

                                        <?php if ($value['is_type'] == 'Long'): ?>
                                            长期采购
                                        <?php else: ?>
                                            短期采购
                                        <?php endif; ?>

                                    </li>
                                    <li><a title="" href="<?= Url::to(['/purchase/view', 'id' => $value['purchase_id']]) ?>">查看详情</a></li>
                                </ul>
                            </div>
                        <?php endforeach; ?>

                    <?php else: ?>

                        <h1>暂无采购信息 !!</h1>

                    <?php endif; ?>

                </div>

            </div>

        </div>
        <!-- 采购列表 -->

    </div>

</div>
<!-- #数据 -->

<!-- 精彩 -->
<div class="container-fluid pru-marvellous" style="background: url(<?= Url::to('@web/themes/qijian/images/guanggao.jpg') ?>) no-repeat center 0;">

    <div class="container">

        <div class="starter-template">
            <h1 class="text-center text-color">建设精彩 · 铸就未来</h1>
            <h5 class="text-center text-color">追求绿色环保、完美空间创造的精神</h5>
            <h5 class="text-center"><a class="pmarve-btn" title="" href="">咨询热线 / <span>400-12345678</span></a></h5>
        </div>

    </div>

</div>
<!-- #精彩 -->

<!-- 新闻 -->
<div class="container h-news">

    <div class="starter-template">
        <h1 class="text-center">
            <span></span>新闻资讯<span></span>
        </h1>
        <h5 class="text-center">
            NEWS TRENDS
        </h5>
    </div>

    <div class="h-news-cont">

        <div class="left">
            <a title="" href="">
                <?= Html::img(Url::to('@web/themes/qijian/images/news_big.jpg'), ['alt' => $this->title]); ?>
            </a>
        </div>

        <div class="right">

            <?php if (!empty($result['news'])): ?>

                <ul>

                    <?php foreach ($result['news'] as $value): ?>
                        <li>
                            <div class="news-left">
                                <a title="<?= $value['title'] ?>" href="<?= Url::to(['/news/view', 'id' => $value['id']]) ?>">
                                    <?= Html::img(Url::to('@web/themes/qijian/images/news-1.jpg'), ['alt' => $value['title']]); ?>
                                </a>
                            </div>

                            <div class="news-right">
                                <a title="<?= $value['title'] ?>" href="<?= Url::to(['/news/view', 'id' => $value['news_id']]) ?>">
                                    <p><?= $value['title'] ?></p>
                                    <p><?= $value['introduction'] ?></p>
                                </a>
                            </div>
                        </li>
                    <?php endforeach; ?>

                </ul>

            <?php else: ?>

                <h1>暂无新闻 !!</h1>

            <?php endif; ?>

        </div>

    </div>

</div>