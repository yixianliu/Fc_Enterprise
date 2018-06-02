<?php


?>

<div class="location">

    <font><?= $this->title ?></font>

    <?=
    \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]);
    ?>

</div>