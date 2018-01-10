<?php
/**
 * 单页面数据列表
 *
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/10
 * Time: 17:03
 */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => $result['menu']['name'], 'url' => ['index', 'id' => $model->c_key]];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('../slide', ['pagekey' => $model->page_id]); ?>

<?= $this->render('../nav'); ?>

<?php if (!empty($model->path)): ?>
    <?=
    $this->render('../../pages/' . $model->path, [
        'model' => $model,
    ]);
    ?>
<?php endif; ?>

<?= $this->render('../left'); ?>

<section class="section-wrap-mp pb-50">
    <div class="container">

        <!-- filter -->
        <div class="row">
            <div class="col-md-12">
                <div class="portfolio-filter">
                    <a href="#" class="filter active" data-filter="*">所有</a>
                    <a href="#" class="filter" data-filter=".web-design">Web Design</a>
                    <a href="#" class="filter" data-filter=".print">Print</a>
                    <a href="#" class="filter" data-filter=".branding">Branding</a>
                    <a href="#" class="filter" data-filter=".mockups">Mockups</a>
                </div>
            </div>
        </div> <!-- end filter -->

        <div class="row">

            <?php foreach ($result['content'] as $value): ?>

                <div class="col-md-3 col-sm-4 col-xs-6 work-item web-design mockups">
                    <div class="work-container">
                        <div class="work-img">

                            <a href="<?= Url::to(['pages/details', 'id' => $value['id']]) ?>" title="<?= Html::encode($value['title']) ?>">
                                <?= Html::img(Url::to('@web/themes/enterprise/img/project_1.jpg'), ['alt' => Html::encode($value['title']), 'class' => '']); ?>
                            </a>

                        </div>
                        <div class="work-description">
                            <h3><a href="<?= Url::to(['pages/details', 'id' => $value['id']]) ?>" title="<?= Html::encode($value['title']) ?>"><?= $value['title'] ?></a></h3>
                            <span><a href="#">Print</a></span>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</section>

<section class="call-to-action bg-light">
    <div class="container">
        <div class="row">

            <div class="col-md-9 col-xs-12">
                <h2>Are you ready to work with us? Let's grow your business.</h2>
            </div>

            <div class="col-md-3 col-xs-12 cta-button">
                <a href="#" class="btn btn-lg btn-color">Contact Us</a>
            </div>

        </div>
    </div>
</section> <!-- end call to action -->
