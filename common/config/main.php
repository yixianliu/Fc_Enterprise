<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        // 云片网
        'smser' => [
            'class'    => 'daixianceng\smser\YunpianSmser',
            'apikey'   => '69164052569b42f33018712a83c6280b', // 请替换成您的Apikey
            'fileMode' => false
        ],
    ],
];
