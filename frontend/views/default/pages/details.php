<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/9
 * Time: 17:04
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => $result['parent']['name'], 'url' => ['list', 'id' => $result['parent']['c_key']]];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('../slide', ['pagekey' => $result['parent']['page_id']]); ?>

<?= $this->render('../nav'); ?>
