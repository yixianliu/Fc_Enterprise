<?php

/**
 * @abstract 挂载中心
 * @author   Yxl <zccem@163.com>
 */

namespace backend\controllers\mount;

use common\models\Role;
use Yii;
use yii\web\Controller;
use backend\models\MountForm;
use backend\models\MountRunForm;

class CenterController extends BaseController
{

    /**
     * @abstract 首页
     */
    public function actionView()
    {
        return $this->render('../view');
    }

    /**
     * @abstract 安装页面
     */
    public function actionRun()
    {
        $model = new MountRunForm();

        $request = Yii::$app->request;

        if ($request->isPost) {

            if ($model->load($request->post())) {

                // 批量SQL语句
                $Sql_Data = file_get_contents(Yii::getAlias('@webroot') . '/SampleSql/base.sql')
                    . file_get_contents(Yii::getAlias('@webroot') . '/SampleSql/power.sql')
                    . file_get_contents(Yii::getAlias('@webroot') . '/SampleSql/data.sql');

                $Sql_Data = str_ireplace('#NAME#', $request->post('MountRunForm')['name'], $Sql_Data);
                $Sql_Data = str_ireplace('#TITLE#', $request->post('MountRunForm')['title'], $Sql_Data);
                $Sql_Data = str_ireplace('#DESCRIPTION#', $request->post('MountRunForm')['description'], $Sql_Data);
                $Sql_Data = str_ireplace('#DEVELOPERS#', $request->post('MountRunForm')['developers'], $Sql_Data);
                $Sql_Data = str_ireplace('#KEYWORDS#', $request->post('MountRunForm')['keywords'], $Sql_Data);
                $Sql_Data = str_ireplace('#ADDRESS#', $request->post('MountRunForm')['address'], $Sql_Data);
                $Sql_Data = str_ireplace('#PERSON#', $request->post('MountRunForm')['person'], $Sql_Data);
                $Sql_Data = str_ireplace('#PHONE#', $request->post('MountRunForm')['phone'], $Sql_Data);
                $Sql_Data = str_ireplace('#DEVELOPERS#', Yii::$app->params['DEVELOPERS'], $Sql_Data);
                $Sql_Data = str_ireplace('#EMAIL#', Yii::$app->params['EMAIL'], $Sql_Data);
                $Sql_Data = str_ireplace('#SITE_URL#', Yii::$app->params['SITE_URL'], $Sql_Data);
                $Sql_Data = str_ireplace('#ICP#', Yii::$app->params['ICP'], $Sql_Data);
                $Sql_Data = str_ireplace('#COPYRIGHT#', Yii::$app->params['COPYRIGHT'], $Sql_Data);

                // 数据库
                $Sql_Data = str_ireplace('#DB_PREFIX#', Yii::$app->components['db']['tablePrefix'], $Sql_Data);
                $Sql_Data = str_ireplace('#DB_CODE#', Yii::$app->components['db']['charset'], $Sql_Data);

                // 后台管理帐号密码
                $Sql_Data = str_ireplace('#USERNAME#', Yii::$app->params['Username'], $Sql_Data);
                $Sql_Data = str_ireplace('#PASSWORD#', Yii::$app->getSecurity()->generatePasswordHash(Yii::$app->params['Password']), $Sql_Data);

                // Time
                $Sql_Data = str_ireplace('#TIME#', time(), $Sql_Data);

                // 执行 SQL
                $arraySql = explode(';', $Sql_Data);

                foreach ($arraySql as $value) {

                    if (!isset($value) || empty($value)) {
                        continue;
                    }

                    // 执行 Sql
                    Yii::$app->db->createCommand($value)->execute();
                }

                Yii::$app->getSession()->setFlash('success', '挂载成功 !!');

            } else {
                Yii::$app->getSession()->setFlash('error', '无法挂载 !!');
            }
        }

        return $this->render('../run', ['model' => $model]);
    }

    /**
     * 存入权限
     *
     * @return string
     */
    public function actionSetpower()
    {

        $request = Yii::$app->request;

        $model = new MountRunForm();

        if ($request->isPost) {

            $auth = Yii::$app->authManager;

            $role = $auth->getRole('admin');

            $power = Role::findByAll('power', 'Off');

            foreach ($power as $value) {
                $child = $auth->getPermission($value);
                $auth->addChild($role, $child);
            }

            // 生成安装文件
            file_put_contents(
                Yii::getAlias('@webroot') . '/' . Yii::$app->params['RD_FILE'], date('Y年m月d日 H时i分s秒') . "\n\r" . Yii::$app->params['NAME'] . "\n\r" . Yii::$app->params['TITLE']
            );

            Yii::$app->getSession()->setFlash('success', '挂载完毕 !!');
        }

        return $this->render('../setpower', ['model' => $model]);
    }

    /**
     * 角色权限关联
     *
     * @param $items
     * @throws \yii\base\Exception
     */
    static public function createEmpowerment($items)
    {
        $auth = Yii::$app->authManager;
        $parent = $auth->createRole($items['name']);
        $child = $auth->createPermission($items['description']);
        $auth->addChild($parent, $child);

        return true;
    }

}
