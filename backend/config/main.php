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

        'user'         => [
            'identityClass'   => 'common\models\Management',
            'enableAutoLogin' => true,
            'identityCookie'  => [
                'name'     => '_identity-backend',
                'path'     => '/admin',
                'httpOnly' => true,
            ],
        ],
        'session'      => [
            // this is the name of the session cookie used for login on the backend
            'name'         => 'advanced-backend',
            'cookieParams' => [
                'path' => '/admin',
            ],
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager'  => [
            'enablePrettyUrl' => true,
            'showScriptName'  => true,
            "rules"           => [
                "<controller:\w+>/<id:\d+>"     => "<controller>/view",
                "<controller:\w+>/<action:\w+>" => "<controller>/<action>"
            ],
        ],

        //components数组中加入authManager组件,有PhpManager和DbManager两种方式,
        //PhpManager将权限关系保存在文件里,这里使用的是DbManager方式,将权限关系保存在数据库.
        'authManager' => [
            'class'        => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
    ],

    'params' => $params,
];
