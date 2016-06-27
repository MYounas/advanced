<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
        ],
        'settings' => [
            'class' => 'backend\modules\settings\Settings',
        ],
    ],
    'components' => [
	/*'view' => [
        'theme' => [
        //theme integration helplink
        //http://www.bsourcecode.com/yiiframework2/install-new-theme-in-yiiframework-2/
            'pathMap' => ['@app/views' => '@app/themes/treecolor'],
            'baseUrl' => '@web/../themes/treecolor',
        ],
],*/
        'i18n'=>[
          'translations'=>[
            'app'=>[
                'class'=>'yii\i18n\DbMessageSource',
//                'basePath'=>'@app/messages',
                'sourceLanguage'=>'en',
//                'fileMap'=>[
//                  'app'=>'app.php',
//                  'app/error'=>'error.php',
//                ],
            ],  
          ],  
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'mailer'=>[
            'class'=>'yii\swiftmailer\Mailer',
            'useFileTransport'=>false,
        ],
        'authManager'=>
            [
                'class'=>'yii\rbac\DbManager',
                'defaultRoles'=>['guest'],
            ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'MyComponent'=>[
          'class'=>'backend\components\MyComponent',  
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'as beforeRequest'=>[
        'class'=>'backend\components\CheckIfLoggedIn',
    ],
    
    'params' => $params,
];
