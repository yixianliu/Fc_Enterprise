<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/9
 * Time: 17:04
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('../slide', ['pagekey' => $model->page_id]); ?>

<?= $this->render('../nav'); ?>
