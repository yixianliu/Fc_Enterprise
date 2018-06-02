<?php
/**
 *
 * 网站左边内容模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/2/5
 * Time: 15:38
 */

use yii\helpers\Url;
use yii\helpers\Html;
use common\models\Pages;
use common\models\Menu;

$id = Yii::$app->request->get('id', 'C0');

$classifyName = null;
$classify = array();

switch (Yii::$app->controller->id) {

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

        $currentPagesData = (Yii::$app->controller->action->id == 'details') ? Pages::findByOne(Yii::$app->request->get('pid', null)) : Pages::findByOne(Yii::$app->request->get('id', null));

        // 父类菜单
        $parentMenuData = Menu::findByOne($currentPagesData['menu']['parent_id']);

        // 查找菜单
        $data = Menu::findByOne($currentPagesData['menu']['m_key'], 'On');

        if (empty($data))
            break;

        $classify = Menu::findByAll($currentPagesData['menu']['parent_id'], Yii::$app->session['language']);

        foreach ($classify as $key => $value) {

            if (empty($value['pages']['page_id'])) {
                unset($classify[ $key ]);
                continue;
            }

            $classify[ $key ]['url'] = Url::to(['/pages/' . $value['is_type'], 'id' => $value['pages']['page_id']]);
        }

        $classifyName = $parentMenuData['name'];

        break;

    // 采购
    case 'purchase':

        $classify = \common\models\PsbClassify::findByAll('P0', 'purchase');

        foreach ($classify as $key => $value) {
            $classify[ $key ]['url'] = Url::to(['/purchase/index', 'id' => $value['c_key']]);
        }

        $classifyName = '采购中心';

        break;

    default:

        break;
}

// 侧边栏内容
$result['Conf'] = \frontend\controllers\BaseController::leftConf();

?>

<div class="left">

    <div class="box"><?= $classifyName ?></div>

    <div class="cat_list">

        <?php if (Yii::$app->controller->id == 'pages'): ?>

            <?php foreach ($classify as $value): ?>
                <a href="<?= $value['url'] ?>" title="<?= $value['name'] ?>">
                    <div <?php if ($value['pages']['page_id'] == $currentPagesData['page_id']): ?> class="cur" <?php endif; ?> title="<?= $value['name'] ?>">
                        <?= $value['name'] ?>
                    </div>
                </a>
            <?php endforeach; ?>

        <?php else: ?>

            <?php foreach ($classify as $value): ?>
                <a href="<?= $value['url'] ?>" title="<?= $value['name'] ?>">
                    <div <?php if ($value['c_key'] == $id): ?> class="cur" <?php endif; ?> title="<?= $value['name'] ?>">
                        <?= $value['name'] ?>
                    </div>
                </a>
            <?php endforeach; ?>

        <?php endif; ?>

    </div>

    <div class="contact">

        <?= Html::img(Url::to('@web/themes/qijian/images/contact.jpg'), ['alt' => $this->title]); ?>

        <ul class="contact_us">
            <li><a>公司名称：<?= $result['Conf']['NAME'] ?></a></li>
            <li><a>联系人：<?= $result['Conf']['PERSON'] ?></a></li>
            <li><a>联系电话：<span><?= $result['Conf']['PHONE'] ?></span></a></li>
            <li><a>公司地址：<span><?= $result['Conf']['ADDRESS'] ?></span></a></li>
        </ul>

    </div>

</div>
