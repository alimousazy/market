<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'hamzah',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
                'user'=>array(
                    'tableUsers' => 'openid_users',
                    'tableProfiles' => 'openid_profiles',
                    'tableProfileFields' => 'profiles_fields',
                ),            
                'hybridauth' => array(
                    'baseUrl' => 'http://10.0.0.9/index.php/hybridauth', 
                    'withYiiUser' => true, // Set to true if using yii-user
                    "providers" => array ( 
                        "openid" => array (
                            "enabled" => true
                        ),

                        "yahoo" => array ( 
                            "enabled" => true 
                        ),

                        "google" => array ( 
                            "enabled" => true,
                            "keys"    => array ( "id" => "tttt", "secret" => "78990hghhgh" ),
                            "scope"   => ""
                        ),

                        "facebook" => array ( 
                            "enabled" => true,
                            "keys"    => array ( "id" => "ewwew", "secret" => "cvvcccvcv" ),
                            "scope"   => "email,publish_stream", 
                            "display" => "" 
                        ),

                        "twitter" => array ( 
                            "enabled" => true,
                            "keys"    => array ( "key" => "fdfddf", "secret" => "ffdd" ) 
                        )
                    )
        ),            
		
	),

	// application components
	'components'=>array(
		'user'=>array(
       //         'class' => 'WebUser',
            'allowAutoLogin'=>true,
            'loginUrl' => array('/user/login'),
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
                                '/'=>"users/register",
                                '/user/login'=>"site/login",
                                '/user/admin'=>"site/login",
                                '/admin/*'=>"user/admin",
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=market',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
