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
use common\models\Menu;

$id = Yii::$app->request->get('id', 'C0');

switch ($type) {

    // 新闻
    case 'news':

        $classify = \common\models\NewsClassify::findByAll();

        foreach ($classify as $key => $value) {
            $classify[ $key ]['url'] = Url::to(['/news/index', 'id' => $value['c_key']]);
        }

        $classifyName = '新闻中心';

        break;

    // 招聘
    case 'job':

        $classifyName = '招聘中心';

        break;

    // 单页面
    case 'pages':

        if (empty($m_key))
            break;

        $data = Menu::findByOne($m_key, 'On');

        if (empty($data))
            break;

        $classify = Menu::findByAll($m_key,  Yii::$app->session['language']);

        foreach ($classify as $key => $value) {

            if (empty($value['pages']['page_id'])) {
                unset($classify[ $key ]);
                continue;
            }

            $classify[ $key ]['url'] = Url::to(['/pages/' . $value['is_type'], 'id' => $value['pages']['page_id']]);
        }

        $classifyName = $data['name'];

        break;

    // 采购
    case 'purchase':

        $classify = \common\models\PsbClassify::findByAll('P0', 'purchase');

        foreach ($classify as $key => $value) {
            $classify[ $key ]['url'] = Url::to(['/purchase/index', 'id' => $value['c_key']]);
        }

        $classifyName = '采购中心';

        break;
}

?>

<div class="left">

    <div class="box"><?= $classifyName ?></div>

    <div class="cat_list">

        <?php if (!empty($classify)): ?>

            <?php if ($type == 'pages'): ?>

                <?php foreach ($classify as $value): ?>
                    <a href="<?= $value['url'] ?>">
                        <div <?php if ($value['pages']['page_id'] == $id): ?> class="cur" <?php endif; ?> >
                            <?= $value['name'] ?>
                        </div>
                    </a>
                <?php endforeach; ?>

            <?php else: ?>

                <?php foreach ($classify as $value): ?>
                    <div <?php if ($value['c_key'] == $id): ?> class="cur" <?php endif; ?> ><a href="<?= $value['url'] ?>"><?= $value['name'] ?></a></div>
                <?php endforeach; ?>

            <?php endif; ?>

        <?php else: ?>

            <a href="#" title="暂无栏目 !!"><div class="cur" >暂无栏目 !!</div></a>

        <?php endif; ?>

    </div>

    <div class="contact">

        <?= Html::img(Url::to('@web/themes/qijian/images/contact.jpg'), ['alt' => $this->title]); ?>

        <?= ConfList::widget(['config' => [$this->title, 'left']]); ?>

    </div>

</div>
