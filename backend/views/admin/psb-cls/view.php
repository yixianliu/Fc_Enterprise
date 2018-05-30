<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PsbClassify */

switch ($model->is_type) {

    default:
    case 'Supply':
        $id = 'S0';
        break;

    case 'Purchase':
        $id = 'P0';
        break;

    case 'Bid':
        $id = 'B0';
        break;
}

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '相关分类中心', 'url' => ['index', 'type' => $model->is_type, 'id' => $id]];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left"><?= Html::encode($this->title) ?></h2>
        </header>
        <div class="content-body">
            <div class="row">

                <p>
                    <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('删除', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data'  => [
                            'confirm' => '是否删除这条记录?',
                            'method'  => 'post',
                        ],
                    ]) ?>
                    <?= Html::a('返回列表', ['index', 'type' => $model->is_type, 'id' => $id], ['class' => 'btn btn-primary']) ?>
                </p>

                <?=
                DetailView::widget([
                    'model'      => $model,
                    'attributes' => [
                        'c_key',
                        'sort_id',
                        'name',
                        'description:ntext',
                        'keywords',
                        [
                            'attribute' => 'parent_id',
                            'value'     => function ($model) {

                                if ($model->parent_id == 'P0' || $model->parent_id == 'S0' || $model->parent_id == 'B0')
                                    return '顶级分类';

                                $data = \common\models\PsbClassify::findOne(['c_key' => $model->parent_id]);

                                return $data->name;
                            },
                        ],
                        [
                            'attribute' => 'is_type',
                            'value'     => function ($model) {
                                $state = [
                                    'Supply' => '供应类型', 'Purchase' => '采购类型', 'Bid' => '投标类型'
                                ];

                                return $state[ $model->is_type ];
                            },
                        ],
                        [
                            'attribute' => 'is_using',
                            'value'     => function ($model) {
                                $state = [
                                    'On'  => '开启',
                                    'Off' => '未启用',
                                ];

                                return $state[ $model->is_using ];
                            },
                        ],
                        [
                            'attribute' => 'created_at',
                            'value'     => function ($model) {
                                return date('Y - m -d , H:i:s', $model->created_at);
                            },
                        ],
                        [
                            'attribute' => 'updated_at',
                            'value'     => function ($model) {
                                return date('Y - m -d , H:i:s', $model->updated_at);
                            },
                        ],
                    ],
                ]);
                ?>

            </div>
        </div>
    </section>
</div>
