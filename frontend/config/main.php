<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id'                  => 'app-frontend',
    'basePath'            => dirname(__DIR__),
    'language'            => 'zh-CN',
    'bootstrap'           => [ 'log' ],
    'controllerNamespace' => 'frontend\controllers',
    'homeUrl'             => '/',

    'components' => [

        // 视图文件
        'view' => [

            'theme' => [
                'basePath' => '@app/frontend/web/themes',
                'baseUrl'  => '@web/frontend/views/themes',
                'pathMap'  => [

                    '@app/views' => [

                        // 默认
                        '@app/views/default',

                        // red
                        '@app/views/red',
                    ],

                ],
            ],

        ],

        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],

        'user' => [
            'identityClass'   => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie'  => [ 'name' => '_identity-frontend', 'httpOnly' => true ],
        ],

        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => [ 'error', 'warning' ],
                ],
            ],
        ],

        'errorHandler' => [
            'errorAction'    => 'center/error',
            'maxSourceLines' => 20,
        ],

        // Urls
        'urlManager'   => [
            // 是否开启美化效果
            'enablePrettyUrl'     => true,
            // 是否或略脚本名index.php
            'showScriptName'      => false,
            // 是否开启严格解析路由
            'enableStrictParsing' => true,
            'suffix'              => '.html',
            'rules'               => [

                // 默认
                ''       => 'center/index',
                'mobile' => 'mobile/center/index',

                '<controller:\w+>/<action:\w+>/<mid:\d+>' => '<controller>/<action>',
                "<controller:\w+>/<action:\w+>"           => "<controller>/<action>",

            ],
        ],

        // 管理样式文件
        'assetManager' => [

            // 设置存放assets的文件目录位置
            'basePath' => '@frontend/web/assets',

            'bundles' => [
                'yii\bootstrap\BootstrapAsset'       => [
                    'css'        => [],  // 去除 bootstrap.css
                    'sourcePath' => null, // 防止在 frontend/web/asset 下生产文件
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'         => [],  // 去除 bootstrap.js
                    'sourcePath' => null,  // 防止在 frontend/web/asset 下生产文件
                ],
            ],
        ],

    ],

    'params' => $params,
];
