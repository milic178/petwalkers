<?php

$params = require(__DIR__ . '/params.php');

$config = [

    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'modelMap' => [
                //overriding modules from extension and adding custom code
                 'RegistrationForm' =>'app\models\RegistrationForm',
                 'Profile' => 'app\models\Profile',
                 'User' => 'app\models\User',
                 'RecoveryForm'=>'app\models\RecoveryForm',
                 'ResendForm'=>'app\models\ResendForm',
                 'SettingsForm'=>'app\models\SettingsForm',
            ],
            //overriding controllers from extension and adding custom code
            'controllerMap' => [
                'settings' => 'app\controllers\ProfileSettingsController',
                'registration' => 'app\controllers\RegisterController',
                'admin' => 'app\controllers\AdminController',
                'recovery'=>'app\controllers\RecoveryController',

            ],
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['milic178']
        ],
        'social' => [
            'class' => 'kartik\social\Module',
            // the global settings for the facebook plugins widget
            'facebook' => [
                'appId' => '875927969242038',
                'app_secret' => '865277203135acc0457f9eae1bb15c2e',
            ],
        ],
        ],


    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],

    'language'=> 'en',
    'sourceLanguage'=>'en',
// required for langselector to  work with Ajax
    'bootstrap' => ['languagepicker'],


    'components' => [

//multi lang component
        'i18n' => [
            'translations' => [

// Writing  translations to sl/fr
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                    'on missingTranslation' => ['app\components\TranslationEventHandler', 'handleMissingTranslation']
                ],
// Overriding user translations to sl/fr
                'user' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'user' => 'user.php',
                    ],
                    'on missingTranslation' => ['app\components\TranslationEventHandler', 'handleMissingTranslation']
                ],
                'kvdialog' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => [
                        'user' => 'user.php',
                    ],
                    'on missingTranslation' => ['app\components\TranslationEventHandler', 'handleMissingTranslation']
                ],

            ],
        ],

        'languagepicker' => [
            'class' => 'lajax\languagepicker\Component',        // List of available languages (icons and text)
            'languages' => ['en' => 'English', 'sl' => 'Slovenian', 'fr' => 'Français']
        ],

        'view' => [
            'class' => 'yii\web\View',
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],

        ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'iCY3G4nFVAzgO9kuYsWw6dJvbiSlE7-D',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.mailtrap.io',
                'username' => 'abf86958b8ae08',
                'password' => '8735220d2e757e',
                'port' => '465',
                'encryption' => 'tls',],
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
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

            ],
    ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
