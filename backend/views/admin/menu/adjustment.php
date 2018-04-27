<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/4/27
 * Time: 11:29
 */

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */

$this->title = '菜单(路径调整) : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '菜单中心', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>