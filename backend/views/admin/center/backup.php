<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/3/19
 * Time: 23:34
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '网站备份';
$this->params['breadcrumbs'][] = ['label' => '网站配置', 'url' => ['index']];

?>

<div class="col-lg-12">
    <section class="box ">

        <header class="panel_header"><h2 class="title pull-left"><?= Html::encode($this->title) ?></h2></header>

        <div class="content-body">

            <div class="row">

                <?php $form = ActiveForm::begin(['action' => ['admin/backup/backup-sql'], 'method' => 'post', 'id' => 'BackUpForm']); ?>

                <div class="form-group">
                    <?= Html::submitButton('备份数据库', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

                <div id="AjaxMsg"></div>

            </div>

            <div class="row">
                <hr/>
            </div>

            <div class="row">

                <?php if (!empty($dataProvider)): ?>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($dataProvider as $value): ?>
                            <tr>
                                <td><?= $value ?></td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>


                <?php else: ?>
                    <h1>暂无备份 !!</h1>
                <?php endif; ?>

            </div>

        </div>
    </section>

    <script type="text/javascript">

        var AjaxMsg = $('#AjaxMsg');

        $('#BackUpForm1').on('submit', function () {

            $.ajax({
                url: '<?= \yii\helpers\Url::to(['admin/backup/backup-sql']) ?>',
                method: 'post',
                dataType: 'json',
                success: function (data) {

                    console.log(data.msg);

                    return true;
                },
                error: function () {
                    AjaxMsg.text('操作失败了!!');
                    return false;
                }
            });

            return true;
        });

    </script>

</div>
