<?php

/**
 * @abstract 挂载中心
 * @author   Yxl <zccem@163.com>
 */

namespace backend\controllers\mount;

use Yii;
use yii\web\Controller;
use backend\models\MountForm;

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
        $model = new MountForm();

        $request = Yii::$app->request;

        if ($request->isPost) {

            if ($model->load($request->post())) {

                $post = $request->post('mysql_data', 'On');

                $mysql_data = ($post == 'Off') ? null : file_get_contents(Yii::getAlias('@webroot') . '/SampleSql/data.sql');

                // 批量SQL语句
                $Sql_Data = file_get_contents(Yii::getAlias('@webroot') . '/SampleSql/base.sql') . $mysql_data;

                $Sql_Data = str_ireplace('#NAME#', $request->post('MountRunForm')['name'], $Sql_Data);
                $Sql_Data = str_ireplace('#TITLE#', $request->post('MountRunForm')['title'], $Sql_Data);
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

        $model = new MountForm();

        $request = Yii::$app->request;

        if ($request->isPost) {

            $model->scenario = 'power';

            if ($model->load($request->post()) && $model->validate()) {

                // 管理员
                $Admin = [
                    'role'  => 'admin',
                    'power' => [
                        'center/index', 'center/conf', // 管理中心
                        'news/create', 'news/edit', 'news/index', 'news/view', // 新闻
                        'news-cls/create', 'news-cls/edit', 'news-cls/index', 'news-cls/view', // 新闻分类
                        'product/create', 'product/edit', 'product/index', 'product/view', // 产品
                        'product-cls/create', 'product-cls/edit', 'product-cls/index', 'product-cls/view', // 产品分类
                        'user/create', 'user/edit', 'user/index', 'user/view', // 用户
                        'job/create', 'job/edit', 'job/index', 'job/view', // 招聘
                    ]
                ];

                $this->createRole($Admin['role']);

                foreach ($Admin['power'] as $value) {
                    $this->createPermission($value);
                    $this->addChild($Admin['role'], $value);
                }

                // 用户
                $User = [
                    'role'  => 'user',
                    'power' => [
                        'news/index', 'news/view', // 新闻
                        'newcls/index', 'newcls/view', // 新闻分类
                        'product/index', 'product/view', // 产品
                        'productcls/index', 'productcls/view', // 产品分类
                        'user/view', // 用户
                    ]
                ];

                $this->createRole($User['role']);

                foreach ($User['power'] as $value) {
                    $this->addChild($User['role'], $value);
                }

                // 生成安装文件
                file_put_contents(
                    Yii::getAlias('@webroot') . '/' . Yii::$app->params['RD_FILE'], date('Y年m月d日 H时i分s秒') . "\n\r" . Yii::$app->params['NAME'] . "\n\r" . Yii::$app->params['TITLE']
                );

                Yii::$app->getSession()->setFlash('success', '添加数据包成功 !!');

            } else {
                Yii::$app->getSession()->setFlash('error', $model->getErrors());
            }
        }

        return $this->render('../setpower', ['model' => $model]);
    }

    // 添加权限
    public function createPermission($name)
    {
        $auth = Yii::$app->authManager;
        $createPost = $auth->createPermission($name);
        $createPost->description = '创建了 ' . $name . ' 权限';
        $auth->add($createPost);

        return true;
    }

    // 添加角色
    public function createRole($name)
    {
        $auth = Yii::$app->authManager;
        $role = $auth->createRole($name);
        $role->description = '创建了 ' . $name . ' 角色';
        $auth->add($role);

        return true;
    }

    // 关联
    public function addChild($role, $power)
    {
        $auth = Yii::$app->authManager;
        $parent = $auth->createRole($role); // 创建角色对象
        $child = $auth->createPermission($power); // 创建权限对象
        $auth->addChild($parent, $child); // 添加对应关系

        return true;
    }

    // 角色分配管理员
    public function assign($item)
    {
        $auth = Yii::$app->authManager;
        $reader = $auth->createRole($item['name']);
        $auth->assign($reader, $item['description']);
    }

}
