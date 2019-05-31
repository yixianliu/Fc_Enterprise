<?php
return [
    'components' => [

        // 数据库
        'db' => [
            'class'       => 'yii\db\Connection',
            'dsn'         => 'mysql:host=localhost;dbname=sql249488',
            'username'    => 'sql249488',
            'password'    => 'dae6c026',
            'charset'     => 'utf8',
            'tablePrefix' => 'fc_',   //加入前缀名称fc_
        ],

        'mailer' => [
            'class'            => 'yii\swiftmailer\Mailer',
            'viewPath'         => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
