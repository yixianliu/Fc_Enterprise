<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/3
 * Time: 11:20
 */

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>

<div class="col-md-3 col-sm-4 col-xs-6 work-item web-design mockups">
    <div class="work-container">
        <div class="work-img">
            <img src="img/project_1.jpg" alt="">
            <div class="portfolio-overlay">
                <div class="project-icons">
                    <a href="img/project_1_big.jpg" class="lightbox-gallery" title="Poster Mockup"><i class="fa fa-search"></i></a>
                    <a href="portfolio-single.html" class="project-icon"><i class="fa fa-link"></i></a>
                </div>
            </div>
        </div>
        <div class="work-description">
            <h3><a href="portfolio-single.html"><?= Html::encode($model->title) ?></a></h3>
            <span><a href="#">Print</a></span>
        </div>
    </div>
</div>
