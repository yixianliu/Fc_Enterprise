<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */

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