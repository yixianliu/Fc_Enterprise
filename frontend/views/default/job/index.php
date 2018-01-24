<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JobSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '招聘中心';
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
    .summary {
        display: none;
    }
</style>

<?= $this->render('../slide', ['pagekey' => 'job']); ?>

<?= $this->render('../nav'); ?>

<section class="section-wrap-mp pb-50">
    <div class="container">

        <div class="row">
            <div class="works-grid titles">

                <?php if (!empty(Yii::$app->user->identity->user_id)): ?>
                    <div class="col-md-12 col-sm-4 col-xs-6 work-item web-design mockups">
                        <?= Html::a('发布招聘', ['create'], ['class' => 'btn']) ?>
                    </div>

                    <br/> <br/> <br/>
                <?php endif; ?>

                <?=
                ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView'     => '_list',
                ]);
                ?>

            </div>
        </div>

    </div>
</section>
