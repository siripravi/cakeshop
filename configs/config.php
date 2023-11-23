<?php

use luya\Config;

$config = new Config('myproject', dirname(__DIR__), [
    'siteTitle' => 'My Project',
    'defaultRoute' => 'cms',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@nyxta' =>'@app/themes/nyxta'
    ],
    'modules' => [
        // Admin module for the `cms` module.
        'cmsadmin' => [
            'class' => 'luya\cms\admin\Module',
        ],
        // Frontend module for the `cms` module.
        'cms' => [
            'class' => 'luya\cms\frontend\Module',
            'contentCompression' => true, // compressing the cms output (removing white spaces and newlines)
        ],
        /*
         * If you have other admin modules (e.g. cmsadmin) then you going to need the admin. The Admin module provides
         * a lot of functionality, like storage, user, permission, crud, etc.
         */
        'admin' => [
            'class' => 'luya\admin\Module',
            'secureLogin' => false, // when enabling secure login, the mail component must be proper configured otherwise the auth token mail will not send.
            'strongPasswordPolicy' => false, // If enabled, the admin user passwords require strength input with special chars, lower, upper, digits and numbers
            'interfaceLanguage' => 'en', // Admin interface default language. Currently supported: en, de, ru, es, fr, ua, it, el, vi, pt, fa
            'autoBootstrapQueue' => true, // Enables the fake cronjob by default, read more about queue/scheduler: https://luya.io/guide/app-queue
        ],
        'cart' => [
            'class' => 'app\modules\cart\Module',
        ],
       /* 'eshopadmin' => [
            'class' => 'app\modules\eshop\admin\Module',
        ],*/
        'catalog' => 'siripravi\catalog\frontend\Module',
        'catalogadmin' => 'siripravi\catalog\admin\Module',

        //'categorytree' => 'app\modules\categorytree\frontend\Module',
       // 'categoryadmin' => 'siripravi\category\admin\Module',
        'gallery' => [
            'class' => 'luya\gallery\frontend\Module',
            'useAppViewPath' => false, // When enabled the views will be looked up in the @app/views folder, otherwise the views shipped with the module will be used.
        ],
        'galleryadmin' => 'luya\gallery\admin\Module',
        'contactform' => [
            'class' => 'luya\contactform\Module',
            'useAppViewPath' => true, // When enabled the views will be looked up in the @app/views folder, otherwise the views shipped with the module will be used.
            'mailTitle' => 'Contact Form',
            'attributes' => [
                'name', 'email', 'street', 'city', 'tel', 'message',
            ],
            'rules' => [
                [['name', 'email', 'street', 'city', 'message'], 'required'],
                ['email', 'email'],
            ],
            'recipients' => [
                'admin@example.com',
            ],
        ],  
    ],
    'components' => [
        'user' => [
            'class' => 'app\models\User',
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'urlManager' => [
            'class' => 'app\components\SiteUrlManager',           
            'enablePrettyUrl' => true,
            'showScriptName' => false,
           
            'rules' => [
                '' => 'site/index',
                '<controller:cart|podbor|info>' => '<controller>/index',
                'thankyou' => 'cart/index',
                '<action:(how|contacts|questions|reviews)>' => 'site/<action>',
                'info/<slug:[0-9a-z\-]+>' => 'info/view',
                'popcron' => 'cron/finance',
                'sitemap.xml' => 'sitemap/index',
                'sitemap_ua.xml' => 'sitemap/ua',
                'sitemap_ru.xml' => 'sitemap/ru',
                '<slug:[0-9a-z\-]+>.html' => 'site/page',               
			],
        ],
        'assetManager' => [
            'linkAssets' => true,
            'appendTimestamp' => true,
            'bundles' => [
               // '\yii\authclient\widgets\AuthChoiceStyleAsset::class' => false,           
               
                'yii\bootstrap5\BootstrapAsset' => [
                    'css' => [], //'@web/css/styles.css',
                ],
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'js' => [
                        'https://code.jquery.com/jquery-3.2.1.min.js',
                    ],
                ],
            ],
        ],
        'storage' => [
            'class' => 'luya\admin\filesystem\LocalFileSystem',
            'whitelistExtensions' => ['csv', 'svg', 'png'],
            'whitelistMimeTypes' => ['text/plain', 'image/svg+xml'], // as this is the mime type for csv files
        ],
        'menu' => [
            'class' => 'luya\cms\Menu',
            // component properties
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'charset' => 'utf8',
        ],
        /*
         * Add your smtp connection to the mail component to send mails (which is required for secure login), you can test your
         * mail component with the luya console command ./vendor/bin/luya health/mailer.
         */
        'mail' => [
            'isSMTP' => false,
            'from' => 'test@luya.io',
            'fromName' => 'test@luya.io',
        ],
        /*
         * The composition component handles your languages and they way your urls will look like. The composition components will
         * automatically add the language prefix which is defined in `default` to your url (the language part in the url  e.g. "yourdomain.com/en/homepage").
         *
         * hidden: (boolean) If this website is not multi lingual you can hide the composition, other whise you have to enable this.
         * default: (array) Contains the default setup for the current language, this must match your language system configuration.
         */
        'composition' => [
            'hidden' => true, // no languages in your url (most case for pages which are not multi lingual)
            'default' => ['langShortCode' => 'en'], // the default language for the composition should match your default language shortCode in the language table.
        ],
        /*
    	 * Translation component. If you don't have translations just remove this component and the folder `messages`.
    	 */
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ],
            ],
        ],
        'urlManager' => [
            'rules' => [
                'home' => 'site/default/index',
                'contact' => 'site/default/contact',
            ],
        ],
    ]
]);

$config->callback(function() {
    define('YII_DEBUG', true);
    define('YII_ENV', 'local');
})->env(Config::ENV_LOCAL);

// database config for 
$config->component('db', [
   // 'dsn' => 'mysql:host=localhost;dbname=cakeonca_bakerdb',
    'dsn' => 'mysql:host=localhost;dbname=cakeoncall',
    'username' => 'root',
    'password' => ''
    // 'dsn' => 'mysql:host=localhost;dbname=DB_NAME;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock', // OSX MAMP
    // 'dsn' => 'mysql:host=localhost;dbname=DB_NAME;unix_socket=/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock', // OSX XAMPP
   // 'username' => 'cakeonca_mahesh',
   // 'password' => 'PenGuin_23!',

])->env(Config::ENV_LOCAL);

/*
// docker mysql config
$config->component('db', [
    'dsn' => 'mysql:host=luya_db;dbname=luya_kickstarter_101',
    'username' => 'luya',
    'password' => 'CHANGE_ME',
])->env(Config::ENV_LOCAL);
*/

$config->component('db', [
    'dsn' => 'mysql:host=localhost;dbname=DB_NAME',
    'username' => '',
    'password' => '',
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 0,
])->env(Config::ENV_PROD);
$config->component('cache', [
    'class' => 'yii\caching\FileCache'
])->env(Config::ENV_LOCAL);
$config->component('cache', [
    'class' => 'yii\caching\FileCache'
])->env(Config::ENV_PROD);

// debug and gii on local env
$config->module('debug', [
    'class' => 'yii\debug\Module',
    'allowedIPs' => ['*'],
])->env(Config::ENV_LOCAL);
$config->module('gii', [
    'class' => 'yii\gii\Module',
    'allowedIPs' => ['*'],
])->env(Config::ENV_LOCAL);

$config->bootstrap(['debug', 'gii'])->env(Config::ENV_LOCAL);

return $config;
