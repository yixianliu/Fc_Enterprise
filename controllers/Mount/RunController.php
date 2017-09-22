<?php

/**
 * @abstract 挂载中心
 * @author   Yxl <zccem@163.com>
 */

namespace app\controllers\Mount;

use Yii;
use app\form\MountRunForm;
use yii\helpers\Json;

class RunController extends BaseController
{

    /**
     * @abstract 安装页面
     */
    public function actionIndex()
    {

        $model = new MountRunForm();

        return $this->render('../run', ['model' => $model]);
    }

    /**
     * @abstract 运行
     */
    public function actionInstall()
    {

        $request = Yii::$app->request;

        if (!$request->isAjax) {
            return Json::encode(['msg' => '非法提交!']);
        }

        $model = new MountRunForm();

        if ($model->load($request->post())) {

            // 批量SQL语句
            $Sql_Data = file_get_contents(Yii::getAlias('@webroot') . '/SampleSql/base.sql') . file_get_contents(Yii::getAlias('@webroot') . '/SampleSql/data.sql');

            $Sql_Data = str_ireplace('#NAME#', Yii::$app->params['NAME'], $Sql_Data);
            $Sql_Data = str_ireplace('#TITLE#', Yii::$app->params['TITLE'], $Sql_Data);
            $Sql_Data = str_ireplace('#DESCRIPTION#', Yii::$app->params['DESCRIPTION'], $Sql_Data);
            $Sql_Data = str_ireplace('#KEYWORDS#', Yii::$app->params['KEYWORDS'], $Sql_Data);
            $Sql_Data = str_ireplace('#DEVELOPERS#', Yii::$app->params['DEVELOPERS'], $Sql_Data);
            $Sql_Data = str_ireplace('#EMAIL#', Yii::$app->params['EMAIL'], $Sql_Data);
            $Sql_Data = str_ireplace('#SITE_URL#', Yii::$app->params['SITE_URL'], $Sql_Data);
            $Sql_Data = str_ireplace('#ICP#', Yii::$app->params['ICP'], $Sql_Data);
            $Sql_Data = str_ireplace('#PHONE#', Yii::$app->params['PHONE'], $Sql_Data);
            $Sql_Data = str_ireplace('#COPYRIGHT#', Yii::$app->params['COPYRIGHT'], $Sql_Data);

            // 数据库
            $Sql_Data = str_ireplace('#DB_PREFIX#', Yii::$app->components['db']['tablePrefix'], $Sql_Data);
            $Sql_Data = str_ireplace('#DB_CODE#', Yii::$app->components['db']['charset'], $Sql_Data);

            // 后台管理帐号密码
            $Sql_Data = str_ireplace('#USERNAME#', Yii::$app->params['Username'], $Sql_Data);
            $Sql_Data = str_ireplace('#PASSWORD#', Yii::$app->getSecurity()->generatePasswordHash(Yii::$app->params['Password']), $Sql_Data);

            // Time
            $Sql_Data = str_ireplace('#TIME#', time(), $Sql_Data);

            $arraySql = explode(';', $Sql_Data);

            // 执行 SQL
            foreach ($arraySql as $value) {

                if (!isset($value) || empty($value)) {
                    continue;
                }

                // 执行 Sql
                Yii::$app->db->createCommand($value)->execute();
            }

            // 生成安装文件
            file_put_contents(
                Yii::getAlias('@webroot') . '/FcCalendar.md', date('Y年m月d日 H时i分s秒') . ' - ' . Yii::$app->params['NAME'] . ' - ' . Yii::$app->params['TITLE'] . ' - ' . time()
            );

            return Json::encode(['msg' => '挂载成功', 'status' => true]);
        }

        // error msg
        $error = empty($model->getErrors()) ? '挂载异常,请检查程序 !!' : $model->getErrors();

        // 验证出错，得到所有的错误信息。
        return Json::encode(['msg' => $error]);
    }

}
