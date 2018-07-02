<?php
/**
 *
 * 采购平台
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/2/6
 * Time: 16:57
 */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = '采购平台';

?>

<?= Html::cssFile('@web/themes/qijian/css/nav.css') ?>
<?= Html::jsFile('@web/themes/qijian/js/jquery1.42.min.js') ?>
<?= Html::jsFile('@web/themes/qijian/js/jquery.SuperSlide.2.1.1.js') ?>
<?= Html::jsFile('@web/themes/qijian/js/scroll.js') ?>

<script type='text/javascript'>
    $(function () {
        myScrolls();
        silmenu();
    });
</script>

<div class='container-fluid classfi-bg' title="<?= $result['conf']['KEYWORDS'] ?>">
    <div class='container shop-classfiy'>

        <div class='search'>

            <form name='search' action='<?= Url::to(['/search/product']) ?>' method='get'>

                <div class='input-group'>

                    <div class='input-group-btn'>
                        <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            产品<span class='caret'></span>
                        </button>
                    </div>

                    <input type='text' class='form-control' aria-label='请输入您要查询的关键字' placeholder='请输入您要查询的关键字' name='title'/>
                    <span class='input-group-btn'><input type='submit' class='btn btn-red' value='搜索'/></span>

                </div>

            </form>

        </div>
        <!-- #搜索 -->

        <!-- 分类导航 -->
        <div id='nav'>

            <!-- 分类标题 -->
            <div class='mod_cate_hd'>全部商品分类</div>

            <ul class='tit'>

                <?php foreach ($result['nav'] as $value): ?>
                    <li class='mod_cate'>

                        <h2><i class='arrow_dot fr'></i><a title='' href=''> <?= $value['name'] ?></a></h2>

                        <div class='mod_subcate'>

                            <div class='mod_subcate_main'>
                                <dl>
                                    <dt>导航分类 :</dt>
                                    <dd><?= $value['name'] ?></dd>
                                </dl>
                            </div>

                            <?php foreach ($value['child'] as $valueChild): ?>
                                <h4><?= $valueChild->name ?></h4>
                            <?php endforeach; ?>

                        </div>

                    </li>
                <?php endforeach; ?>

            </ul>

        </div>

        <div class='nav-cont' style='float: right;'>
            <div class='pur-user-login'>

                <?php if (Yii::$app->user->isGuest): ?>

                    <div class='nav-cont-title'>会员登录</div>

                    <div class='input-group'>
                        <span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
                        <input type='text' class='form-control' placeholder='帐号' aria-describedby='帐号'/>
                    </div>

                    <div class='input-group'>
                        <span class='input-group-addon'><i class='glyphicon glyphicon-pass'></i></span>
                        <input type='text' class='form-control' placeholder='密码' aria-describedby='密码'/>
                    </div>

                    <div class='input-group'>
                        <a class='btn btn-red' title='立即登录' href='<?= Url::to(['/member/reg']); ?>'>立即登录</a>
                    </div>

                    <div class='input-group'>
                        <a class='reg' title='' href='<?= Url::to(['/member/reg']); ?>'>免费注册</a>
                    </div>

                <?php else: ?>

                    <div class='nav-cont-title'>会员登录</div>

                    <div class='input-group'>

                    </div>

                    <div class='input-group'>

                    </div>

                <?php endif; ?>

            </div>
            <!-- #用户登录,注册 -->

            <!-- 采购列表 -->
            <div class=' purchase-cont'>

                <div class='nav-cont-title'>
                    采购动态<a title='' href='<?= Url::to(['/purchase/index']); ?>'>...</a>
                </div>

                <div class='purchase-cont-list myscroll'>

                    <?php if (!empty($result['result'])): ?>

                        <ul>

                            <?php foreach ($result['result'] as $value): ?>
                                <li><a title href='<?= Url::to(['/purchase/view', 'id' => $value['purchase_id']]) ?>'>[采购] <?= $value['title'] ?></a></li>
                            <?php endforeach; ?>

                        </ul>

                    <?php else: ?>

                        暂无信息 !!

                    <?php endif; ?>

                </div>

            </div>
        </div>

    </div>
</div>

<?= $this->render('../_slide'); ?>

<!-- 数据 -->
<div class='container-fluid pur-data'>
    <div class='container'>

        <!-- 采购列表 -->
        <div class='data-list'>

            <div class='left'>
                <?= Html::img(Url::to('@web/themes/qijian/images/tender-1.jpg'), ['alt' => $result['conf']['KEYWORDS']]); ?>
            </div>

            <div class='right'>

                <div class='data-right-title'>

                    <div class='data-title-left'>采购寻源</div>

                    <div class='data-title-right'>
                        <a title='' href='<?= Url::to(['/purchase/index']) ?>'>更多 >>></a>
                    </div>

                </div>

                <div class='data-right-list'>

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
                                    <li><a title='' href='<?= Url::to(['/purchase/view', 'id' => $value['purchase_id']]) ?>'>查看详情</a></li>
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
<div class='container-fluid pru-marvellous' style='background: url(<?= Url::to('@web/themes/qijian/images/guanggao.jpg') ?>) no-repeat center 0;'>

    <div class='container'>

        <div class='starter-template'>
            <h1 class='text-center text-color'>建设精彩 · 铸就未来</h1>
            <h5 class='text-center text-color'>追求绿色环保、完美空间创造的精神</h5>
            <h5 class='text-center'><a class='pmarve-btn' title='' href=''>咨询热线 / <span>400-12345678</span></a></h5>
        </div>

    </div>

</div>
<!-- #精彩 -->

<!-- 新闻 -->
<div class='container h-news'>

    <div class='starter-template'>
        <h1 class='text-center'>
            <span></span>新闻资讯<span></span>
        </h1>
        <h5 class='text-center'>
            NEWS TRENDS
        </h5>
    </div>

    <div class='h-news-cont'>

        <div class='left'>

            <?php if (!empty($result['news']['hot'])): ?>
                <a title='<?= $result['news']['hot']['title'] ?>' href='<?= Url::to(['/news/view', 'id' => $result['news']['hot']['new_id']]) ?>'>
                    <?= Html::img(Url::to('@web/themes/qijian/images/news_big.jpg'), ['alt' => $result['news']['hot']['title']]); ?>
                </a>
            <?php endif; ?>

        </div>

        <div class='right'>

            <?php if (!empty($result['news']['recommend'])): ?>

                <ul>

                    <?php foreach ($result['news']['recommend'] as $value): ?>
                        <li>
                            <div class='news-left'>
                                <a title='<?= $value['title'] ?>' href='<?= Url::to(['/news/view', 'id' => $value['id']]) ?>'>
                                    <?= Html::img(Url::to('@web/themes/qijian/images/news-1.jpg'), ['alt' => $value['title']]); ?>
                                </a>
                            </div>

                            <div class='news-right'>
                                <a title='<?= $value['title'] ?>' href='<?= Url::to(['/news/view', 'id' => $value['news_id']]) ?>'>
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