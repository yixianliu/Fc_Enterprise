<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '导航分类';
$this->params['breadcrumbs'][] = $this->title;

if (!empty($dataProvider)) {

    $html = null;

    foreach ($dataProvider as $value) {

        $createHtml = Html::a('添加导航分类', ['admin/nav-cls/create'], ['class' => "btn btn-primary"]);
        $updateHtml = Html::a('编辑导航分类', ['admin/nav-cls/update', 'id' => $value['c_key']], ['class' => 'btn btn-primary']);

        $html .= '<li class="">';
        $html .= '    <div class="uk-nestable-item" style="padding: 5px;">▸';
        $html .= $value['name'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . $updateHtml . '&nbsp;' . $createHtml;
        $html .= '    </div>';

        if (!empty($value['child'])) {

            $html .= '    <ul class="">';

            foreach ($value['child'] as $valueCls) {

                $updateHtml = Html::a('编辑分类', ['admin/product-cls/update', 'id' => $valueCls['c_key']], ['class' => 'btn btn-primary']);

                $html .= '<li class="">';
                $html .= '    <div class="uk-nestable-item" style="padding: 5px;">▸';
                $html .= $valueCls['name'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . $updateHtml . '&nbsp;' . $createHtml;
                $html .= '    </div>';
                $html .= '</li>';
            }

            $html .= '    </ul>';
        }

        $html .= '</li>';
    }

} else {
    $html = null;
}

/**
 * 递归
 *
 * @param $data
 * @return mixed
 */
function recursionCls($data)
{
    return $data;
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
                    <?= Html::a('发布导航分类', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <hr/>

                <ul class="uk-nestable" style="font-size: 13px;">
                    <?= $html ?>
                </ul>

            </div>
        </div>
    </section>
</div>
