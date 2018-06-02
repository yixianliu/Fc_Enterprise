<?php
/**
 * 单页面数据列表
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/10
 * Time: 17:03
 */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $model['menu']['name'];
$this->params['breadcrumbs'][] = ['label' => $result['parent']['name']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('../slide', ['pagekey' => $model['page_id']]); ?>

<!-- 左右框架 -->
<div class="container content">

    <?= $this->render('../_left'); ?>

    <!-- 右边 -->
    <div class="right">

        <?= $this->render('../_nav'); ?>

        <div class="content_news_list">

            <?php if (!empty($result['data'])): ?>

                <?php foreach ($result['data'] as $value): ?>

                    <div>
                        <a href="<?= Url::to(['pages/details', 'id' => $value['id'], 'pid' => $value['page_id']]) ?>" title="<?= Html::encode($value['title']) ?>">
                            <?= Html::encode($value['title']) ?>
                        </a>
                        <span><?= date('Y - m - d', $value['updated_at']) ?></span>
                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <h1>暂无内容 !!</h1>

            <?php endif; ?>

        </div>

    </div>
    <!-- 右边 -->

</div>
