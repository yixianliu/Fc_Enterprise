<?php
/**
 * Created by Yxl.
 * User: <zccem@163.com>.
 * Date: 2018/6/9
 * Time: 10:11
 */

$this->title = '网站地图';

?>

<?= $this->render('../slide', ['pagekey' => 'comment']); ?>

<div class="container content">

    <?= $this->render('../_left'); ?>

    <!-- 右边 -->
    <div class="right">

        <?= $this->render('../_nav'); ?>

        <div class="conY_text">

            <?= $result['NAME'] ?><br/><br/>

            邮箱：qiantanglianou@163.com<br/><br/>

            <?= Yii::t('app','phone') ?> ：<?= $result['PHONE'] ?><br/><br/>

            全国加盟热线：400-700-3166<br/><br/>

            <?= Yii::t('app','address') ?> ：<?= $result['ADDRESS'] ?><br/><br/>

            <iframe id="mapbarframe" framespacing="0" height="600" marginheight="0" border="0" src="<?= $result['MapUrl'] ?>" frameborder="0" width="100%" marginwidth="0" scrolling="no"></iframe>

        </div>

    </div>

</div>
