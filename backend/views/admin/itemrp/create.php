<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ItemRp */

$this->title = '创建角色权限';
$this->params['breadcrumbs'][] = ['label' => '角色权限', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-lg-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">

                <?= Html::encode($this->title) ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            </h2>
        </header>
        <div class="content-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <?=
                    $this->render('_form', [
                        'model'  => $model,
                    ]);
                    ?>

                </div>
            </div>
        </div>
    </section>
</div>