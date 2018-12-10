<?php
return [
    'id' => 'app-common-tests',
    'basePath' => dirname(_DIR_),
    'components' => [
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'common\models\User',
        ],
        'request' => [
            'cookieValidationKey' => 'test',
        ],
    ],
];