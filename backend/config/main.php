<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id'                  => 'app-backend',
    'basePath'            => dirname(__DIR__),
    'language'            => 'zh-CN',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap'           => ['log'],
    'modules'             => [],
    'homeUrl'             => '/admin',

    'components' => [

        'request' => [
            'csrfParam' => '_csrf-backend',
        ],

        'user' => [
            'identityClass'   => 'common\models\Management',
            'enableAutoLogin' => true,
            'loginUrl'        => ['admin/member/login'],
            'identityCookie'  => [
                'name'     => '_identity-backend',
                'path'     => '/admin',
                'httpOnly' => true,
            ],
        ],

        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],

        'errorHandler' => [
            'errorAction' => 'admin/center/error',
        ],

        'urlManager'  => [
            'enablePrettyUrl' => true,
            'showScriptName'  => true,
            "rules"           => [

                // 默认
                '' => 'admin/center/index',
            ],
        ],

        // components数组中加入authManager组件,有PhpManager和DbManager两种方式,
        // PhpManager将权限关系保存在文件里,这里使用的是DbManager方式,将权限关系保存在数据库.
        'authManager' => [
            'class'           => 'yii\rbac\DbManager',
            'defaultRoles'    => ['guest'],

            // Mysql 表
            'itemTable'       => 'fc_auth_role', // 角色 + 权限
            'assignmentTable' => 'fc_auth_user_role', // 用户
            'itemChildTable'  => 'fc_auth_role_permisson', // 关联
            'ruleTable'       => 'fc_auth_rule', // 规则
        ],
    ],

    'params' => $params,
];