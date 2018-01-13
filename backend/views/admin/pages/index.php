<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SinglePageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '单页面列表';
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

        $html .= '<li class="">';
        $html .= '    <div class="uk-nestable-item">▸';
        $html .= $values['name'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . Html::a('编辑', ['update', 'id' => $values['id']], ['class' => 'btn btn-primary']) . '&nbsp;' . Html::a('添加此类目下的菜单', ['create', 'id' => $values['c_key']], ['class' => "btn btn-primary"]);
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
            <h2 class="title pull-left">
                <?= Html::encode($this->title) ?>
            </h2>
        </header>
        <div class="content-body">
            <div class="row">

                <hr/>

                <p>
                    <?= Html::a('创建单页面', ['create'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('创建单页面模板文件', ['admin/pages-tpl-file/create'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('发布单页面分类', ['admin/pages-cls/create'], ['class' => 'btn btn-success']) ?>
                </p>

                <hr/>

                <ul class="uk-nestable"
                    <?php foreach ($result as $value): ?>
                        <li>

                            <a class="btn btn-primary" href="<?= Url::to(['admin/menu/index', 'id' => $value['c_key']]) ?>"><?= $value['name'] ?></a>

                            <?php if (!empty($value['child'])): ?>
                                <?= recursionPages($value['child']) ?>
                            <?php endif; ?>

                        </li>

                    <?php endforeach; ?>
                </ul>


            </div>
        </div>
    </section>
</div>

