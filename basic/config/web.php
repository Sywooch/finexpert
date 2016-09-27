<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            
            'cookieValidationKey' => 'J_lPhXns_npR7PYvaoqVQqhs92pkU1za',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                [
                    'pattern' => 'sitemap-home', 
                    'route' => 'sitemap-home/index', 
                    'suffix' => '.xml'
                ],
                [
                    'pattern' => 'sitemap', 
                    'route' => 'sitemap/index', 
                    'suffix' => '.xml'
                ],
                [
                    'pattern' => 'sitemap1', 
                    'route' => 'sitemap1/index', 
                    'suffix' => '.xml'
                ],
                [
                    'pattern' => 'sitemap2', 
                    'route' => 'sitemap2/index', 
                    'suffix' => '.xml'
                ],
                [
                    'pattern' => 'sitemap3', 
                    'route' => 'sitemap3/index', 
                    'suffix' => '.xml'
                ],
                [
                    'pattern' => 'sitemap4', 
                    'route' => 'sitemap4/index', 
                    'suffix' => '.xml'
                ],
                [
                    'pattern' => 'sitemap5', 
                    'route' => 'sitemap5/index', 
                    'suffix' => '.xml'
                ],
                [
                    'pattern' => 'sitemap6', 
                    'route' => 'sitemap6/index', 
                    'suffix' => '.xml'
                ],
                [
                    'pattern' => 'sitemap7', 
                    'route' => 'sitemap7/index', 
                    'suffix' => '.xml'
                ],
                [
                    'pattern' => 'sitemap8', 
                    'route' => 'sitemap8/index', 
                    'suffix' => '.xml'
                ],
                [
                    'pattern' => 'sitemap9', 
                    'route' => 'sitemap9/index', 
                    'suffix' => '.xml'
                ],
                [
                    'pattern' => 'sitemap10', 
                    'route' => 'sitemap10/index', 
                    'suffix' => '.xml'
                ],
                [
                    'pattern' => 'sitemap11', 
                    'route' => 'sitemap11/index', 
                    'suffix' => '.xml'
                ],
                [
                    'pattern' => 'sitemap12', 
                    'route' => 'sitemap12/index', 
                    'suffix' => '.xml'
                ],
                'city/<id:\d+>/<payment:\w+>' => 'site/city',
                'city/<id:\d+>' => 'site/city',
                'loans/<payment:\w+>' => 'site/loans',
                '<action>'=>'site/<action>',
                //'city/<id:\d+><payment:[a-z]>' => 'city',
                


            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
