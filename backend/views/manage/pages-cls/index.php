<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PagesClassifySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '单页面分类列表';
$this->params['breadcrumbs'][] = $this->title;

// 初始化
$result = null;

if (!empty($dataProvider)) {
    foreach ($dataProvider as $value) {

        if (empty($value))
            continue;

        $result .= recursionCls($value);
    }
}

/**
 * 递归菜单
 *
 * @param $data
 * @return array|void
 */
function recursionCls($data)
{
    if (empty($data))
        return;

    $html = '<li class="">';
    $html .= '    <div class="uk-nestable-item" style="padding: 5px;">▸';
    $html .= $data['name'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . Html::a('编辑', ['update', 'id' => $data['c_key']], ['class' => "collapsed"]) . ' / ' . '&nbsp;' . Html::a('添加子分类', ['create', 'id' => $data['c_key']], ['class' => "collapsed"]) . ' / ';
    $html .= '    </div>';

    if (!empty($data['child'])) {
        foreach ($data['child'] as $value) {
            $html .= '    <ul class="">';
            $html .= recursionCls($value);
            $html .= '    </ul>';
        }
    }

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
                    <?= Html::a('发布单页面分类', ['create'], ['class' => "collapsed"]) . ' / ' ?>
                    <?= Html::a('创建单页面', ['admin/pages/create'], ['class' => "collapsed"]) . ' / ' ?>
                </p>

                <hr/>

                <ul class="uk-nestable" style="font-size: 13px;">
                    <?php if (!empty($result)): ?>
                        <?= $result ?>
                    <?php else: ?>
                        <h3>暂无分类 !!</h3>
                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </section>
</div>