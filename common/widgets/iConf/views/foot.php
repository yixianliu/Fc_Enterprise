<?php
/**
 *
 * 底部模板
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/24
 * Time: 15:26
 */

use yii\helpers\Url;
use yii\helpers\Html;

$img = empty($result['code']['parameter']) ? 'themes/qijian/images/code.jpg' : '/../../../backend/web/temp/conf/' . $result['code']['parameter'];

$footHtml = null;

if (!empty($result['footArray'])) {

    // 循环
    foreach ($result['footArray'] as $value) {

        switch ($value['menuModel']['url_key']) {

            // 招聘
            case 'job':
                $footHtml .= ' <li><a title="<?= $value[\'name\'] ?>" href="#"><?= $value[\'name\'] ?></a></li>';
                break;

            // 产品模型
            case 'product':

                $product = ProductClassify::findByAll('C0');

                foreach ($product as $values) {
                    $array[] = [
                        'label'   => $values['name'],
                        'url'     => ['/product/index', 'id' => $values['c_key']],
                        'items'   => $this->recursionMenu($values, $type),
                        'options' => ['class' => 'sub-menu'],
                    ];
                }
                break;

            // 采购模型
            case 'purchase':
                $array = $this->recursionPurchaseMenu($value, $type);
                break;

            // 供应模型
            case 'supply':

                $product = PsbClassify::findAll(['is_using' => 'On', 'is_type' => 'Supply']);

                foreach ($product as $values) {
                    $array[] = [
                        'label' => $values['name'],
                        'url'   => ['/supply/index', 'id' => $values['c_key']],
                        'items' => $this->recursionMenu($values, $type),
                    ];
                }
                break;

            // 投标模型
            case 'bid':

                $product = PsbClassify::findAll(['is_using' => 'On', 'parent_id' => 'C0']);

                foreach ($product as $values) {
                    $array[] = [
                        'label' => $values['name'],
                        'url'   => ['/bid/index', 'id' => $values['c_key']],
                        'items' => $this->recursionMenu($values),
                    ];
                }
                break;

            // 新闻模型
            case 'news':

                $news = NewsClassify::findByAll('C0');

                foreach ($news as $values) {
                    $array[] = [
                        'label' => $values['name'],
                        'url'   => ['/news/index', 'id' => $values['c_key']],
                        'items' => $this->recursionMenu($values),
                    ];
                }
                break;

            // 自定义
            case 'pages':
                $array = $this->recursionPagesMenu($value, $type);
                break;

            // 超链接
            case 'urls':
                $array = $this->recursionUrlMenu($value, $value['parent_id'], $type);
                break;
        }
    }
}

?>

<div class="container-fluid foot">
    <div class="container">

        <div class="col-xs-12">
            <ul>

                <?php foreach ($footMenu as $value): ?>
                    <li><a title="<?= $value['name'] ?>" href="#"><?= $value['name'] ?></a></li>
                <?php endforeach; ?>

            </ul>
        </div>

        <div class="col-xs-12 foot-cont">

            <div class="col-xs-10">
                <p style="font-size: 24px;font-weight: bold;"><?= $result['Conf']['PHONE'] ?></p>
                <p style="font-weight: bold;">欢迎来电咨询</p>
                <p>地址 : <?= $result['Conf']['ADDRESS'] ?></p>
            </div>

            <div class="col-xs-2">
                <?= Html::img(Url::to('@web/' . $img), ['alt' => '']); ?>
            </div>

        </div>

        <div class="col-xs-12 copy">@2018 <?= $result['Conf']['ICP'] ?></div>

    </div>
</div>

