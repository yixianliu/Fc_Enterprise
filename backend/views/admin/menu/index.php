<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\models\Menu;
use common\models\ProductClassify;
use common\models\NewsClassify;
use common\models\Pages;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '菜单列表';
$this->params['breadcrumbs'][] = $this->title;

// 初始化
$html = null;

if (!empty($dataProvider)) {

    // 循环一级目录
    foreach ($dataProvider as $value) {

        $array = [
            'create'   => null,
            'update'   => Html::a('编辑菜单', ['update', 'id' => $value['m_key']], ['class' => "collapsed"]) . ' / ',
            'del'      => Html::a('删除菜单', ['delete', 'id' => $value['m_key']], ['class' => "collapsed"]) . ' / ',
            'entering' => null,
        ];

        // 新闻和产品没有子菜单
        if ($value['menuModel']['model_key'] == 'UC1' || $value['menuModel']['model_key'] == 'UU1') {
            $array['create'] = Html::a('添加子菜单', ['create', 'id' => $value['m_key']], ['class' => "collapsed"]) . ' / ';
        }

        if ($value['menuModel']['model_key'] == 'UC1' && $value['pages']['is_type'] == 'list') {
            $array['entering'] = Html::a('录入内容', ['admin/pages-list/create', 'id' => $value['m_key']],['class' => "collapsed"]) . ' / ';
        }

        $html .= '<li class="">';
        $html .= '    <div class="uk-nestable-item" style="padding: 5px;">&nbsp;&nbsp;▸';
        $html .= $value['name'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . $array['update'] . '&nbsp;' . $array['create'] . '&nbsp;' . $array['del'] . '&nbsp;' . $array['entering'];
        $html .= '    </div>';
        $html .= '    <ul class="">';

        // 选择模型
        switch ($value['menuModel']['url_key']) {

            // 产品
            case 'product':
                $html .= recursionProductData($value);
                break;

            // 新闻
            case 'news':
                $html .= recursionNewsData($value);
                break;

            // 单页面
            case 'pages':
                $html .= recursionPagesData($value);
                break;

            // 超链接
            case 'urls':
                $html .= recursionUrlData($value);
                break;

            // 采购
            case 'purchase':
                $html .= recursionPurchaseData($value);
                break;

            default:
                break;
        }

        $html .= '    </ul>';
        $html .= '</li>';
    }
}

/**
 * 采购信息
 *
 * @param $data
 * @return null|string|void
 */
function recursionPurchaseData($data)
{
    if (empty($data))
        return;

    $child = Menu::findByAll($data['m_key']);

    if (empty($child))
        return;

    // 初始化
    $html = null;

    foreach ($child as $value) {

        // Html 内容
        $html .= menuHtml($value, 'purchase');

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

    // 父类
    $data['c_key'] = empty($data['c_key']) ? null : $data['c_key'];

    $child = ProductClassify::findByAll($data['c_key']);

    if (empty($child))
        return;

    // 初始化
    $html = null;

    foreach ($child as $value) {

        // Html 内容
        $html .= menuHtml($value, 'product');
    }

    return $html;
}

/**
 * 新闻分类递归
 *
 * @param $data
 * @return null|string|void
 */
function recursionNewsData($data)
{
    if (empty($data))
        return;

    // 父类
    $data['c_key'] = empty($data['c_key']) ? null : $data['c_key'];

    $child = NewsClassify::findByAll($data['c_key']);

    if (empty($child))
        return;

    // 初始化
    $html = null;

    foreach ($child as $value) {

        // Html 内容
        $html .= menuHtml($value, 'news');
    }

    return $html;
}

/**
 * 单页面递归
 *
 * @param $data
 * @return null|string|void
 */
function recursionPagesData($data)
{
    if (empty($data))
        return;

    // 查找相对应的菜单
    $child = Menu::findByAll($data['m_key']);

    if (empty($child))
        return;

    $html = null;

    foreach ($child as $value) {

        if (empty($value['pages']['page_id']))
            continue;

        // Html 内容
        $html .= menuHtml($value, 'pages');
    }

    return $html;
}

/**
 * 编辑超链接
 *
 * @param $data
 * @return null|string|void
 */
function recursionUrlData($data)
{
    if (empty($data))
        return;

    // 初始化
    $html = null;

    $child = Menu::findByAll($data['m_key']);

    if (empty($child))
        return;

    foreach ($child as $value) {

        // Html 内容
        $html .= menuHtml($value, 'urls');
    }

    return $html;
}

/**
 * Html 和 样式文件
 *
 * @param $data
 * @param $type
 * @return null|string
 */
function menuHtml($data, $type)
{

    if (empty($data) || empty($type))
        return;

    $array = ['create' => null, 'update' => null, 'del' => null, 'content' => null];
    $enteringHtml = null;

    // 根据类别递归
    switch ($type) {

        // 新闻
        case 'news':

            if (empty($data['c_key']))
                break;

            $array = [
                'create'  => Html::a('添加分类', ['admin/news-cls/create'], ['class' => "collapsed"]) . ' / ',
                'update'  => Html::a('编辑分类', ['admin/news-cls/update', 'id' => $data['c_key']], ['class' => "collapsed"]) . ' / ',
                'del'     => Html::a('删除分类', ['admin/news-cls/delete', 'id' => $data['c_key']], ['class' => "collapsed"]) . ' / ',
                'content' => null
            ];
            break;

        // 产品
        case 'product':

            if (empty($data['c_key']))
                break;

            $array = [
                'create'  => Html::a('添加分类', ['admin/product-cls/create'], ['class' => "collapsed"]) . ' / ',
                'update'  => Html::a('编辑分类', ['admin/product-cls/update', 'id' => $data['c_key']], ['class' => 'collapsed']) . ' / ',
                'del'     => Html::a('删除分类', ['admin/product-cls/delete', 'id' => $data['c_key']], ['class' => 'collapsed']) . ' / ',
                'content' => null
            ];
            break;

        // 自定义页面
        case 'pages':
            $array = [
                'create'  => Html::a('添加子菜单', ['create', 'id' => $data['m_key']], ['class' => "collapsed"]) . ' / ',
                'update'  => Html::a('编辑菜单', ['update', 'id' => $data['m_key']], ['class' => "collapsed"]) . ' / ',
                'del'     => Html::a('删除菜单', ['delete', 'id' => $data['m_key']], ['class' => "collapsed"]) . ' / ',
                'content' => Html::a('编辑内容', ['admin/pages/update', 'id' => $data['pages']['page_id']], ['class' => "collapsed"]) . ' / ',
            ];

            $entering = Pages::findByOne($data['pages']['page_id']);

            if ($entering['menu']['model_key'] == 'UC1' && $entering['is_type'] == 'list')
                $enteringHtml = Html::a('录入内容', ['admin/pages-list/create', 'id' => $entering['m_key']], ['class' => "collapsed"]) . ' / ';

            break;

        // 链接
        case 'urls':
            $array = [
                'create'  => Html::a('添加子菜单', ['create', 'id' => $data['m_key']], ['class' => "collapsed"]) . ' / ',
                'update'  => Html::a('编辑单页面分类', ['update', 'id' => $data['m_key']], ['class' => "collapsed"]) . ' / ',
                'del'     => Html::a('删除单页面分类', ['delete', 'id' => $data['m_key']], ['class' => "collapsed"]) . ' / ',
                'content' => null
            ];
            break;

        case 'purchase':
            $array = [
                'create'  => Html::a('添加子菜单', ['create', 'id' => $data['m_key']], ['class' => "collapsed"]) . ' / ',
                'update'  => Html::a('编辑菜单', ['update', 'id' => $data['m_key']], ['class' => "collapsed"]) . ' / ',
                'del'     => Html::a('删除菜单', ['delete', 'id' => $data['m_key']], ['class' => "collapsed"]) . ' / ',
                'content' => Html::a('编辑内容', ['admin/pages/update', 'id' => $data['pages']['page_id']], ['class' => "collapsed"]) . ' / ',
            ];
            break;
    }

    $html = null;
    $html .= '<li class="">';
    $html .= '    <div class="uk-nestable-item" style="padding: 5px;">&nbsp;&nbsp;▸';
    $html .= $data['name'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . $array['update'] . '&nbsp;' . $array['create'] . '&nbsp;' . $array['del'] . '&nbsp;' . $array['content'];

    // 根据单页面是列表的,增加录入内容链接
    $html .= '&nbsp;' . $enteringHtml;

    $html .= '    </div>';
    $html .= '    <ul class="">';

    // 根据类别递归
    switch ($type) {

        case 'urls':
            $html .= recursionUrlData($data);
            break;

        case 'pages':
            $html .= recursionPagesData($data);
            break;

        case 'news':
            $html .= recursionNewsData($data);
            break;

        case 'product':
            $html .= recursionProductData($data);
            break;
    }

    $html .= '    </ul>';
    $html .= '</li>';

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

                <p>
                    <?= Html::a('创建菜单', ['create'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('创建单页面', ['admin/pages/create'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('创建单页面分类', ['admin/pages-cls/create'], ['class' => 'btn btn-success']) ?>
                </p>

                <hr/>

                <ul class="uk-nestable" style="font-size: 13px;">
                    <?= $html ?>
                </ul>

            </div>
        </div>
    </section>
</div>

