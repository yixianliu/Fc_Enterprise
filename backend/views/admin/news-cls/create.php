<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\NewsClassify */

$this->title = '创建新闻分类';
$this->params['breadcrumbs'][] = ['label' => '新闻分类', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

                <div class="col-md-12 col-sm-12 col-xs-12">

                    <?=
                    $this->render('_form', [
                        'model'  => $model,
                        'result' => $result,
                    ]);
                    ?>

                </div>
            </div>
        </div>
    </section>
</div>