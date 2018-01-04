<section class="page-title style-2">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">

                <?=
                \yii\widgets\Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]);
                ?>

            </div>
        </div>
    </div>
</section>