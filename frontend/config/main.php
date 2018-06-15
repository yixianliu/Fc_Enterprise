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
    'bootstrap'           => ['log'],
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
            'identityCookie'  => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],

        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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

        'urlManager'   => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'suffix'          => '.html',
            'rules'           => [

                // 默认
                '' => 'center/index',
            ],
        ],

        // 管理样式文件
        'assetManager' => [
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

        'i18n' => [
            'translations' => [
                'app*' => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap'  => [
                        'app'       => 'common.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
    ],

    'params' => $params,
];
