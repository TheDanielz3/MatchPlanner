<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'api' => [
            'class' => 'backend\modules\api\Api',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/user',
                    'pluralize' => 'false',

                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/userprofile',
                    'pluralize' => 'false',

                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/teamprofile',
                    'pluralize' => 'false',

                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/event',
                    'pluralize' => 'false',

                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/post',
                    'pluralize' => 'false',

                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/comment',
                    'pluralize' => 'false',

                    /*'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                    '<controller:\w+>/<id:\d+>' => '<controller>/view',*/
                ],
            ],
        ],
    ],

    'params' => $params,
];