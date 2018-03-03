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

$this->title = $result['menu']['name'];
$this->params['breadcrumbs'][] = ['label' => $result['menu']['name'], 'url' => ['index', 'id' => $model->page_id]];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('../slide', ['pagekey' => $model->page_id]); ?>

<!-- 左右框架 -->
<div class="container content">

    <<?= $this->render('../_left', ['type' => 'pages', 'm_key' => $result['menu']['parent_id']]); ?>

    <!-- 右边 -->
    <div class="right">

        <?= $this->render('../nav'); ?>

        <hr/>

        <?php if (!empty($result['data'])): ?>

            <?php foreach ($result['data'] as $value): ?>

                <div>
                    <a href="<?= Url::to(['pages/details', 'id' => $value['id']]) ?>" title="<?= Html::encode($value['title']) ?>">
                        <?= Html::encode($value->title) ?>
                    </a>
                    <span><?= date('Y - m - d', $value->updated_at) ?></span>
                </div>

            <?php endforeach; ?>

        <?php else: ?>

        <h1>暂无数据 !!</h1>

        <?php endif; ?>

    </div>
    <!-- 右边 -->

</div>
