<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '导航分类';
$this->params['breadcrumbs'][] = $this->title;

if (!empty($dataProvider)) {

    foreach ($dataProvider as $value) {

    }

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


            </div>
        </div>
    </section>
</div>
