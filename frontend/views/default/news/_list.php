<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/1/3
 * Time: 11:20
 */

use yii\helpers\Url;
use yii\helpers\Html;

?>

<?= Html::a($model->title, Url::to([ 'news/view', 'id' => $model->news_id ]), [ 'title' => $model->title ]) ?>

<span><?= date('Y - m - d', $model->updated_at) ?></span>