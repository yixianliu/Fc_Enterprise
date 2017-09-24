<?php
/**
 *
 * 用户列表模板
 *
 * Created by Yixianliu.
 * User: Yxl <zccem@163.com>
 * Date: 2017/6/7
 * Time: 10:19
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = '文化中心';

?>

<div class="col-lg-12">
    <section class="box ">

        <header class="panel_header">
            <h2 class="title pull-left" style="font-weight: 400;font-family: 'Microsoft YaHei';">用户列表</h2>
            <div class="actions panel_actions pull-right">
                <i class="box_toggle fa fa-chevron-down"></i>
                <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                <i class="box_close fa fa-times"></i>
            </div>
        </header>

        <div class="content-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <?php if (empty($result)): ?>

                        <table class="table table-striped">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>用户名</th>
                                <th>用户角色</th>
                                <th>用户评分</th>
                                <th>用户昵称</th>
                                <th>#</th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php foreach ($result as $key => $value): ?>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><?= $value['username']; ?></td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>

                        <?= LinkPager::widget(['pagination' => $pages]); ?>

                    <?php else: ?>

                        <h1>暂无数据 !!</h1>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
</div>
