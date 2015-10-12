<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Corredora Sol & Cobre',
	'language'=>'es',
	'defaultController'=>'site',
	'layout'=>'main',


	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
	        'application.models.*',
	        'application.components.*',
					'application.extensions.EAjaxUpload.*',            // <------
    ),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'widgetFactory'=>array(
			'widgets'=>array(
				'SAImageDisplayer'=>array(
					'baseDir' => 'images',
					'originalFolderName' => 'propiedades',
					'sizes' =>array(
				    'tiny' => array('width' => 40, 'height' => 30),
				    'big' => array('width' => 640, 'height' => 480),
				    'thumb' => array('width' => 400, 'height' => 300),
				   ),
        ),
			),
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=> 'false',
			'urlSuffix'=>'.html',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>/<id2>/<id3:w*{a-zA-z0-9\-]*>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\d+>/<id2>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		// database settings are configured in database.php
		'db'=>array(
            'class'=>'CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=sun;',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '12345',
            'charset' => 'utf8',

        ),


		//'errorHandler'=>array(
			// use 'site/error' action to display errors
		//	'errorAction'=>YII_DEBUG ? null : 'site/error',
		//),

		'log'=>array(
		'class'=>'CLogRouter',
	'routes'=>array(
			array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages

				array(
					'class'=>'CWebLogRoute',
				),
			),
		),
	),
);
