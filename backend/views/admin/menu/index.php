<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '菜单列表';
$this->params['breadcrumbs'][] = $this->title;

if (!empty($dataProvider)) {

    // 初始化
    $result = null;

    foreach ($dataProvider as $value) {
        $result .= recursionMenu($value);
    }
}

/**
 * 递归菜单
 *
 * @param $data
 * @return array|void
 */
function recursionMenu($data)
{
    if (empty($data))
        return;

    $child = \common\models\Menu::findAll(['is_using' => 'On', 'parent_id' => $data['m_key']]);

    $html = '<li class="">';
    $html .= '    <div class="uk-nestable-item" style="padding: 5px;">▸';
    $html .= $data['name'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . Html::a('编辑', ['update', 'id' => $data['id']], ['class' => 'btn btn-primary']) . '&nbsp;' . Html::a('添加分类', ['create', 'id' => $data['m_key']], ['class' => "btn btn-primary"]);
    $html .= '    </div>';
    foreach ($child as $value) {
        $html .= '    <ul class="">';
        $html .= recursionMenu($value);
        $html .= '    </ul>';
    }
    $html .= '</li>';

    return $html;
}

?>

<?php $this->registerCssFile('@web/themes/assets/plugins/uikit/css/uikit.min.css'); ?>
<?php $this->registerCssFile('@web/themes/assets/plugins/uikit/css/components/nestable.min.css'); ?>

<style type="text/css">
    .Menu li {

    }
</style>

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

