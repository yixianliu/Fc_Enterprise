<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '下载分类';
$this->params['breadcrumbs'][] = $this->title;

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
    $html .= $data['name'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . Html::a('编辑', ['update', 'id' => $data['c_key']]) . '&nbsp;/&nbsp;' . Html::a('添加子类', ['create', 'id' => $data['c_key']]);
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

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?></h2></header>

        <div class="content-body">
            <div class="row">

                <p>
                    <?= Html::a('创建下载分类', ['create'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('发布文件', ['admin/download/create'], ['class' => 'btn btn-success']) ?>
                </p>

                <hr/>

                <?php if (!empty($result)): ?>

                    <ul class="uk-nestable" style="font-size: 13px;">
                        <?= $result ?>
                    </ul>

                <?php else: ?>

                    <h3>暂无任何分类 !!</h3>

                <?php endif; ?>

            </div>
        </div>
    </section>
</div>

