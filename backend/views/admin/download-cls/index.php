<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '下载分类';
$this->params['breadcrumbs'][] = $this->title;

if (!empty($dataProvider)) {

    // 初始化
    $result = null;

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
    $html .= $data['name'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . Html::a('编辑', ['update', 'id' => $data['c_key']], ['class' => 'btn btn-primary']) . '&nbsp;' . Html::a('添加此类目下的菜单', ['create', 'id' => $data['c_key']], ['class' => "btn btn-primary"]);
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
            <h2 class="title pull-left"><?= Html::encode($this->title) ?></h2>
        </header>
        <div class="content-body">
            <div class="row">

                <p>
                    <?= Html::a('创建下载分类', ['create'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('发布文件', ['admin/download/create'], ['class' => 'btn btn-success']) ?>
                </p>

                <hr/>

                <ul class="uk-nestable" style="font-size: 13px;">
                    <?= $result ?>
                </ul>

            </div>
        </div>
    </section>
</div>

