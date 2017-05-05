<?php

/**
 * @abstract 挂载中心
 * @author Yxl <zccem@163.com>
 */

namespace app\controllers\Mount;

use Yii;
use yii\web\Controller;
use app\models\MountRunForm;

class RunController extends BaseController {

    /**
     * @abstract 安装页面
     */
    public function actionIndex() {

        $model = new MountRunForm();

        return $this->render('index', ['model' => $model]);
    }

    /**
     * @abstract 运行
     */
    public function actionInstall() {

        $request = Yii::$app->request;

        if (!$request->isAjax) {
            return \yii\helpers\Json::encode(['msg' => '非法提交!']);
        }

        $model = new MountRunForm();

        if ($model->load($request->post())) {

            // 连接数据库
            $db = new \yii\db\Connection([Yii::$app->db]);

            $db->open();

            // 批量SQL语句
            $Sql_Data = file_get_contents(Yii::getAlias('@webroot') . '/Sample/Sql/base.sql') . file_get_contents(Yii::getAlias('@webroot') . '/Sample/Sql/data.sql');

            $Sql_Data = str_ireplace('#NAME#', Yii::getAlias('@NAME'), $Sql_Data);
            $Sql_Data = str_ireplace('#TITLE#', Yii::getAlias('@TITLE'), $Sql_Data);
            $Sql_Data = str_ireplace('#DESCRIPTION#', Yii::getAlias('@DESCRIPTION'), $Sql_Data);
            $Sql_Data = str_ireplace('#KEYWORDS#', Yii::getAlias('@KEYWORDS'), $Sql_Data);
            $Sql_Data = str_ireplace('#DEVELOPERS#', Yii::getAlias('@DEVELOPERS'), $Sql_Data);
            $Sql_Data = str_ireplace('#EMAIL#', Yii::getAlias('@EMAIL'), $Sql_Data);
            $Sql_Data = str_ireplace('#SITE_URL#', Yii::getAlias('@SITE_URL'), $Sql_Data);
            $Sql_Data = str_ireplace('#ICP#', Yii::getAlias('@ICP'), $Sql_Data);
            $Sql_Data = str_ireplace('#PHONE#', Yii::getAlias('@PHONE'), $Sql_Data);
            $Sql_Data = str_ireplace('#COPYRIGHT#', Yii::getAlias('@COPYRIGHT'), $Sql_Data);

            $Sql_Data = str_ireplace('#DB_PREFIX#', Yii::getAlias('@DB_PREFIX'), $Sql_Data);
            $Sql_Data = str_ireplace('#DB_ENGINE#', Yii::getAlias('@DB_ENGINE'), $Sql_Data);
            $Sql_Data = str_ireplace('#DB_CODE#', Yii::getAlias('@DB_CODE'), $Sql_Data);
            $Sql_Data = str_ireplace('#USERNAME#', Yii::getAlias('@USERNAME'), $Sql_Data);
            $Sql_Data = str_ireplace('#PASSWORD#', Yii::getAlias('@PASSWORD'), $Sql_Data);
            $Sql_Data = str_ireplace('#SITE_URL#', Yii::getAlias('@SITE_URL'), $Sql_Data);
            $Sql_Data = str_ireplace('#DEVELOPERS#', Yii::getAlias('@DEVELOPERS'), $Sql_Data);
            $Sql_Data = str_ireplace('#TITLE#', Yii::getAlias('@TITLE'), $Sql_Data);
            $Sql_Data = str_ireplace('#TIME#', time(), $Sql_Data);

            $arraySql = explode(';', $Sql_Data);

            // 执行 SQL
            foreach ($arraySql as $value) {

                if (!isset($value) || empty($value)) {
                    continue;
                }

                // 执行 Sql
                $db->createCommand($value)->execute();
            }

            // 生成数据库配置文件
            $Sql_File_Data = file_get_contents(Yii::getAlias('@common') . '/Sample/Conf/DatabaseSample.php');

            $Sql_File_Data = str_ireplace('#DB_HOST#', Yii::$app->db['dbhost'], $Sql_File_Data);
            $Sql_File_Data = str_ireplace('#DB_USER#', Yii::$app->db['dbuser'], $Sql_File_Data);
            $Sql_File_Data = str_ireplace('#DB_PW#', Yii::$app->db['dbpw'], $Sql_File_Data);
            $Sql_File_Data = str_ireplace('#DB_NAME#', Yii::$app->db['dbname'], $Sql_File_Data);
            $Sql_File_Data = str_ireplace('#DB_PREFIX#', Yii::getAlias('@DB_PREFIX'), $Sql_File_Data);
            $Sql_File_Data = str_ireplace('#DB_CODE#', Yii::getAlias('@DB_CODE'), $Sql_File_Data);
            $Sql_File_Data = str_ireplace('#DB_PORT#', Yii::getAlias('@DB_PORT'), $Sql_File_Data);
            $Sql_File_Data = str_ireplace('#DB_SUFFIX#', NULL, $Sql_File_Data);

            file_put_contents(Yii::getAlias('@common') . '/config/db.php', $Sql_File_Data);

            // 生成配置文件
            $Config_Data = file_get_contents(Yii::getAlias('@common') . '/Sample/Conf/ConfSample.php');

            // 自定义配置
            $Config_Data = str_ireplace('#NAME#', Yii::getAlias('@NAME'), $Config_Data);
            $Config_Data = str_ireplace('#SITE_URL#', Yii::getAlias('@SITE_URL'), $Config_Data);
            $Config_Data = str_ireplace('#DEVELOPERS#', Yii::getAlias('@DEVELOPERS'), $Config_Data);
            $Config_Data = str_ireplace('#TITLE#', Yii::getAlias('@TITLE'), $Config_Data);
            $Config_Data = str_ireplace('#EMAIL#', Yii::getAlias('@EMAIL'), $Config_Data);
            $Config_Data = str_ireplace('#DESCRIPTION#', Yii::getAlias('@DESCRIPTION'), $Config_Data);
            $Config_Data = str_ireplace('#ICP#', Yii::getAlias('@ICP'), $Config_Data);
            $Config_Data = str_ireplace('#PHONE#', Yii::getAlias('@PHONE'), $Config_Data);
            $Config_Data = str_ireplace('#COPYRIGHT#', Yii::getAlias('@COPYRIGHT'), $Config_Data);
            $Config_Data = str_ireplace('#KEYWORDS#', Yii::getAlias('@KEYWORDS'), $Config_Data);
            $Config_Data = str_ireplace('#TIME_FORMAT#', 'm . d . Y', $Config_Data);
            $Config_Data = str_ireplace('#COMMENT_NUM#', 25, $Config_Data);
            $Config_Data = str_ireplace('#VIEW_NUM#', 10, $Config_Data);
            $Config_Data = str_ireplace('#FILE_UPLOAD_TYPE#', 'zip,gz,rar,iso,doc,xsl,ppt,wps', $Config_Data);
            $Config_Data = str_ireplace('#IMAGE_UPLOAD_TYPE#', 'jpg,gif,png', $Config_Data);
            $Config_Data = str_ireplace('#FILE_UPLOAD_SIZE#', 5000000, $Config_Data);
            $Config_Data = str_ireplace('#IMAGE_UPLOAD_SIZE#', 5000000, $Config_Data);
            $Config_Data = str_ireplace('#CODE_STATUS#', 'On', $Config_Data);
            $Config_Data = str_ireplace('#REG_STATUS#', 'On', $Config_Data);
            $Config_Data = str_ireplace('#WEB_STATUS#', 'On', $Config_Data);
            $Config_Data = str_ireplace('#LOGIN_STATUS#', 'On', $Config_Data);

            file_put_contents(Yii::getAlias('@common') . '/config/params.php', $Config_Data);

            // 生成安装文件
            file_put_contents(Yii::getAlias('@webroot') . '/' . Yii::getAlias('@INSTALL_STATUS'), date('Y年m月d日 H时i分s秒') . ' - ' . Yii::getAlias('@NAME') . ' - ' . Yii::getAlias('@TITLE') . ' - ' . time());

            return \yii\helpers\Json::encode(TRUE);
        }

        // error msg
        $error = empty($model->getErrors()) ? '挂载异常,请检查程序 !!' : $model->getErrors();

        // 验证出错，得到所有的错误信息。
        return \yii\helpers\Json::encode(['msg' => $error]);
    }

}
