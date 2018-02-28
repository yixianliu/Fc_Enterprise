<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SinglePageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '自定义页面列表';
$this->params['breadcrumbs'][] = $this->title;

/**
 * 递归单页面
 *
 * @param $data
 * @return array|void
 */
function recursionPages($data)
{
    if (empty($data))
        return;

    $html = null;

    $html .= '<ul class="">';
    foreach ($data as $values) {

        $create = Html::a('添加子页面', ['create', 'id' => $values['page_id']], ['class' => "btn btn-primary"]);
        $update = Html::a('编辑', ['update', 'id' => $values['page_id']], ['class' => 'btn btn-primary']);
        $del = Html::a('删除自定义页面', ['delete', 'id' => $values['page_id']], ['class' => 'btn btn-primary']);

        $html .= '<li class="">';
        $html .= '    <div class="uk-nestable-item">&nbsp;&nbsp;▸';
        $html .= $values['menu']['name'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . $update . '&nbsp;' . $create . '&nbsp;' . $del;
        $html .= '    </div>';

        if (!empty($values['child'])) {
            foreach ($values['child'] as $value) {
                $html .= '    <ul class="">';
                $html .= recursionPages($value['child']);
                $html .= '    </ul>';
            }
        }

        $html .= '</li>';
    }
    $html .= '</ul>';

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

                <hr/>

                <p>
                    <?= Html::a('创建单页面', ['create'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('添加单页面分类', ['admin/pages-cls/create'], ['class' => 'btn btn-success']) ?>
                </p>

                <hr/>

                <ul class="uk-nestable">

                    <?php if (!empty($result)): ?>

                        <?php foreach ($result as $value): ?>

                            <li class="">

                                <div class="uk-nestable-item">

                                    <div class="uk-nestable-item">&nbsp;&nbsp;▸<?= $value['menu']['name'] ?>&nbsp;&nbsp;&nbsp;&nbsp;

                                        <?= Html::a('添加下级单页面', ['create', 'id' => $value['page_id']], ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('编辑', ['update', 'id' => $value['page_id']], ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('删除', ['delete', 'id' => $value['page_id']], ['class' => 'btn btn-success']) ?>

                                    </div>

                                </div>

                                <?php if (!empty($value['child'])): ?>
                                    <?= recursionPages($value['child']) ?>
                                <?php endif; ?>

                            </li>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <h1>暂无数据 !!</h1>

                    <?php endif; ?>

                </ul>


            </div>
        </div>
    </section>
</div>

