<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'modules' => [
        
        'admin' => [
            'class' => 'mdm\admin\Module',

            'layout' => 'left-menu', //otros valores 'right-menu', 'top-menu' y 'null'
            
        ],
        'controllerMap' => [
                 'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'app\models\User',
                    'idField' => 'id',
                ]
            ],
            'menus' => [
                'assignment' => [
                    'label' => 'Grand Access' 
                ],
                'route' => 'Grand Access', // deshabilitar ítem
            ],
        
    ],
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],


    'components' => [



        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'mVNWpnAwzhnrXe5-czXz_jFsYFMmQJPD',


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
            'useFileTransport' => true,
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */

        'authManager' => [
            'class' => 'yii\rbac\DbManager', // o 'yii\rbac\PhpManager'
        ]
    ],

    'as access' => [
        'class' => 'mdm\admin\classes\AccessControl',
        'allowActions' => [
        // agregar acciones para permitir acceso a todos
            'site/*', 
            // 'admin/*', // Eliminar cuando ya se haya configurado un usuario administrador
        ]
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
