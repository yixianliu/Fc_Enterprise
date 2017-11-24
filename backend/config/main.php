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

    'components' => [

        'request' => [
            'csrfParam' => '_csrf-backend',
        ],

        'user'    => [
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
        'log'     => [
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

                "<controller:\w+>/<id:\d+>"     => "<controller>/view",
                "<controller:\w+>/<action:\w+>" => "<controller>/<action>"
            ],
        ],

        //components数组中加入authManager组件,有PhpManager和DbManager两种方式,
        //PhpManager将权限关系保存在文件里,这里使用的是DbManager方式,将权限关系保存在数据库.
        'authManager' => [
            'class'           => 'yii\rbac\DbManager',
            'defaultRoles'    => ['guest'],

            // Mysql 表
            'itemTable'       => 'Fc_ItemRp', // 角色 + 权限
            'assignmentTable' => 'Fc_Assignment', // 用户
            'itemChildTable'  => 'Fc_Item_related', // 关联
            'ruleTable'       => 'Fc_Rules', // 规则
        ],
    ],

    'params' => $params,
];
