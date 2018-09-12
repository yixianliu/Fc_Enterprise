<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/9/12
 * Time: 17:23
 */

$this->title = '错误页面';

?>

<div class="col-md-12 col-sm-12 col-xs-12">

    <h1 class="page_error_code text-primary"><?= $exception->statusCode; ?></h1>
    <h1 class="page_error_info"><?= $exception->getMessage(); ?></h1>

    <div class="col-md-6 col-sm-6 col-xs-8 col-md-offset-3 col-sm-offset-3 col-xs-offset-2">
        <form action="#" method="post" class="page_error_search">

            <div class="input-group transparent">
                <span class="input-group-addon"><i class="fa fa-search icon-primary"></i></span>
                <input type="text" class="form-control" placeholder="尝试搜索..">
                <input type='submit' value="">
            </div>

            <div class="text-center page_error_btn">
                <a class="btn btn-primary btn-lg" href='<?= \yii\helpers\Url::to(['admin/center/index']); ?>'><i class='fa fa-location-arrow'></i> &nbsp; 返回首页</a>
            </div>
        </form>
    </div>

</div>