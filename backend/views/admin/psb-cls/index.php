<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PsbClassifySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

switch ($type) {

    default:
    case 'Supply':
        $this->title = '供应分类列表';
        break;

    case 'Purchase':
        $this->title = '采购分类列表';
        break;

    case 'Bid':
        $this->title = '投标分类列表';
        break;
}


$this->params['breadcrumbs'][] = $this->title;

// 初始化
$result = null;

if (!empty($dataProvider)) {

    foreach ($dataProvider as $value) {

        if (empty($value))
            continue;

        $result .= recursionCls($value, $type, $id);
    }
}

/**
 * 递归菜单
 *
 * @param $data
 * @param $type
 * @param $id
 * @return string|void
 */
function recursionCls($data, $type, $id)
{
    if (empty($data))
        return;

    $html = '<li class="">';
    $html .= '    <div class="uk-nestable-item" style="padding: 5px;">▸';
    $html .= $data['name'] . '&nbsp;&nbsp;' . Html::a('编辑', ['update', 'id' => $data['c_key']], ['class' => 'btn btn-primary']) . '&nbsp;' . Html::a('添加子分类', ['create', 'id' => $id, 'parent_id' => $data['c_key'], 'type' => $type], ['class' => "btn btn-primary"]);
    $html .= '    </div>';

    if (!empty($data['child'])) {
        foreach ($data['child'] as $value) {
            $html .= '    <ul class="">';
            $html .= recursionCls($value, $type, $id);
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
                    <?= Html::a('发布分类', ['create', 'type' => $type,'id' => $id], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('供应中心分类', ['index', 'type' => 'Supply', 'id' => 'S0'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('采购中心分类', ['index', 'type' => 'Purchase', 'id' => 'P0'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('投标中心分类', ['index', 'type' => 'Bid', 'id' => 'B0'], ['class' => 'btn btn-success']) ?>
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

        <?= $this->render('../../formMsg'); ?>

    </section>
</div>

