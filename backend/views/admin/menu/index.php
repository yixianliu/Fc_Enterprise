<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\models\ProductClassify;
use common\models\NewsClassify;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '菜单列表';
$this->params['breadcrumbs'][] = $this->title;

if (!empty($dataProvider)) {

    // 初始化
    $result = null;

    foreach ($dataProvider as $value) {

        $create = Html::a('添加菜单', ['admin/menu/create', 'id' => $value['m_key']], ['class' => "btn btn-primary"]);
        $update = Html::a('编辑菜单', ['admin/menu/update', 'id' => $value['m_key']], ['class' => 'btn btn-primary']);

        $result .= '<li class="">';
        $result .= menuHtml($value['name'], $create, $update);

        $result .= '    <ul class="">';
        $result .= recursionMenu($value);
        $result .= '    </ul>';

        $result .= '</li>';
    }
}

/**
 * 递归菜单
 *
 * @param $data
 * @param null $model
 * @return string|void
 */
function recursionMenu($data, $model = null)
{
    if (empty($data))
        return;

    $html = null;

    // Html 标签
    if ($data['menuModel']['url_key'] != 'news' && $data['menuModel']['url_key'] != 'product') {

        $create = Html::a('添加菜单', ['create', 'id' => $data['m_key']], ['class' => "btn btn-primary"]);

    } else {

        // 选择模型
        switch ($data['menuModel']['url_key']) {

            case 'product':

                $create = Html::a('添加分类', ['admin/product-cls/create'], ['class' => "btn btn-primary"]);
                $update = Html::a('编辑菜单', ['admin/menu/update', 'id' => $data['m_key']], ['class' => 'btn btn-primary']);

                $child = ProductClassify::findByAll();

                if (!empty($child)) {
                    foreach ($child as $value) {

                        $html .= '<li class="">';
                        $html .= menuHtml($value['name'], $create, $update);

                        $html .= '    <ul class="">';
                        $html .= recursionProductData($value->toArray());
                        $html .= '    </ul>';

                        $html .= '</li>';
                    }
                }

                break;

            case 'news':

                $create = Html::a('添加分类', ['admin/news/create'], ['class' => "btn btn-primary"]);
                $update = Html::a('编辑菜单', ['admin/menu/update', 'id' => $data['m_key']], ['class' => 'btn btn-primary']);

                $child = NewsClassify::findByAll();

                if (!empty($child)) {
                    foreach ($child as $value) {

                        $html .= '<li class="">';
                        $html .= menuHtml($value['name'], $create, $update);

                        $html .= '    <ul class="">';
                        $html .= recursionNewsData($value->toArray());
                        $html .= '    </ul>';

                        $html .= '</li>';
                    }
                }
                break;
        }

    }

    return $html;
}

/**
 * 产品分类递归
 *
 * @param $data
 * @return array|void
 */
function recursionProductData($data)
{
    if (empty($data))
        return;

    $child = ProductClassify::findByAll($data['c_key']);

    if (empty($child))
        return;

    $create = Html::a('添加分类', ['admin/product-cls/create'], ['class' => "btn btn-primary"]);
    $update = Html::a('编辑分类', ['admin/product-cls/update', 'id' => $data['c_key']], ['class' => 'btn btn-primary']);

    // 初始化
    $html = null;

    foreach ($child as $value) {

        $html .= '<li class="">';
        $html .= menuHtml($value['name'], $create, $update);

        $html .= '    <ul class="">';
        $html .= recursionProductData($value->toArray());
        $html .= '    </ul>';

        $html .= '</li>';
    }

    return $html;
}

/**
 * 产品分类递归
 *
 * @param $data
 * @return array|void
 */
function recursionNewsData($data)
{
    if (empty($data))
        return;

    $child = NewsClassify::findByAll($data['c_key']);

    if (empty($child))
        return;

    $create = Html::a('添加分类', ['admin/news-cls/create'], ['class' => "btn btn-primary"]);
    $update = Html::a('编辑分类', ['admin/news-cls/update', 'id' => $data['c_key']], ['class' => 'btn btn-primary']);

    // 初始化
    $html = null;

    foreach ($child as $value) {

        $html .= '<li class="">';
        $html .= menuHtml($value['name'], $create, $update);

        $html .= '    <ul class="">';
        $html .= recursionNewsData($value->toArray());
        $html .= '    </ul>';

        $html .= '</li>';
    }

    return $html;
}

/**
 * Html 和 样式文件
 *
 * @param $name
 * @param $updateHtml
 * @param $createHtml
 * @return null|string
 */
function menuHtml($name, $updateHtml, $createHtml)
{

    $html = null;

    $html .= '    <div class="uk-nestable-item" style="padding: 5px;">▸';
    $html .= $name . '&nbsp;&nbsp;&nbsp;&nbsp;' . $updateHtml . '&nbsp;' . $createHtml;
    $html .= '    </div>';

    return $html;
}

?>

<?php $this->registerCssFile('@web/themes/assets/plugins/uikit/css/uikit.min.css'); ?>
<?php $this->registerCssFile('@web/themes/assets/plugins/uikit/css/components/nestable.min.css'); ?>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">
                <?= Html::encode($this->title) ?>
            </h2>
        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <p>
                        <?= Html::a('创建菜单', ['create'], ['class' => 'btn btn-success']) ?>

                        <?= Html::a('创建单页面', ['admin/pages/create'], ['class' => 'btn btn-success']) ?>

                        <?= Html::a('创建单页面分类', ['admin/pages-cls/create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <hr/>

                    <ul class="portfolio-filter list-inline">
                        <?php foreach ($parent as $value): ?>
                            <li><a class="btn btn-primary" href="<?= Url::to(['admin/menu/index', 'id' => $value['m_key']]) ?>"><?= $value['name'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>

                    <hr/>

                    <ul class="uk-nestable" style="font-size: 13px;">
                        <?= $result ?>
                    </ul>

                </div>
            </div>
        </div>
    </section>
</div>

