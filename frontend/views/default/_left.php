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

    // 产品中心
    case 'product':
        $classifyName = '产品中心';
        break;

    // 下载中心
    case 'download':

        $classifyName = '下载中心';

        $classify = \common\models\DownloadCls::findByAll();

        foreach ($classify as $key => $value) {
            $classify[ $key ]['url'] = Url::to(['/download/index', 'id' => $value['c_key']]);
        }

        break;

    // 公司地图
    case 'map':
        $classifyName = '公司地图';
        break;

    // 在线留言
    case 'comment':
        $classifyName = '在线留言';
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

        // 为一级目录
        if ($currentPagesData['menu']['parent_id'] == Menu::$frontend_parent_id) {

            $classifyName = $currentPagesData['menu']['name'];

            $classify = Menu::findByAll($currentPagesData['menu']['m_key'], Yii::$app->session['language']);

        } else {

            $classify = Menu::findByAll($currentPagesData['menu']['parent_id'], Yii::$app->session['language']);

            $classifyName = $parentMenuData['name'];
        }

        foreach ($classify as $key => $value) {

            if (empty($value['pages']['page_id'])) {
                unset($classify[ $key ]);
                continue;
            }

            $classify[ $key ]['url'] = Url::to(['/pages/' . $value['is_type'], 'id' => $value['pages']['page_id']]);
        }

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

// 侧边栏的官方内容
$result['Conf'] = \common\models\Conf::findByConfArray(Yii::$app->session['language']);

function menuHandel()
{

}

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
            <li><a><?= Yii::t('app', 'company') ?> ：<?= $result['Conf']['NAME'] ?></a></li>
            <li><a><?= Yii::t('app', 'contacts') ?> ：<?= $result['Conf']['PERSON'] ?></a></li>
            <li><a><?= Yii::t('app', 'phone') ?> ：<span><?= $result['Conf']['PHONE'] ?></span></a></li>
            <li><a><?= Yii::t('app', 'address') ?> ：<span><?= $result['Conf']['ADDRESS'] ?></span></a></li>
        </ul>

    </div>

</div>
