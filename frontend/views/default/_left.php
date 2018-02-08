<?php
/**
 *
 * 左边内容
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/2/5
 * Time: 15:38
 */

if (empty($type))
    return false;

use yii\helpers\Url;
use yii\helpers\Html;
use common\widgets\iConf\ConfList;

$id = Yii::$app->request->get('id', 'C0');

switch ($type) {

    // 新闻
    case 'news':

        $classify = \common\models\NewsClassify::findByAll();

        $classifyName = '新闻中心';

        break;

    // 招聘
    case 'job':

        $classifyName = '招聘中心';

        break;

    // 单页面
    case 'pages':

        if (empty($id))
            return false;

        $pages = \common\models\Pages::findOne(['page_id' => $id]);

        $menuData = \common\models\Menu::findOne(['m_key' => $pages['m_key']]);

        $classifyName = $menuData['name'];

        break;
}

?>

<div class="left">

    <div class="box"><?= $classifyName ?></div>

    <div class="cat_list">

        <?php if (!empty($classify)): ?>

            <div class="cur"><a href="#">公司新闻</a></div>

            <?php foreach ($classify as $value): ?>
                <div <?php if ($value['c_key'] == $id): ?> class="cur" <?php endif; ?> ><a href="#"><?= $value['name'] ?></a></div>
            <?php endforeach; ?>

        <?php endif; ?>

    </div>

    <div class="contact">

        <?= Html::img(Url::to('@web/themes/qijian/images/contact.jpg'), ['alt' => $this->title]); ?>

        <?= ConfList::widget(['config' => [$this->title, 'left']]); ?>

    </div>

</div>
