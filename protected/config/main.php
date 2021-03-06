<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'CDEEP',

	// preloading 'log' component
	'preload'=>array('log'),

	//path alises
	'aliases'=>array(
	'bootstrap'=>realpath(__DIR__.'/../extensions/bootstrap'),
     'yiiwheels'=>realpath(__DIR__.'/../extensions/yiiwheels'),
	),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.vendors.*',
		'bootstrap.helpers.TbHtml',
		'bootstrap.helpers.TbArray',
		'bootstrap.behaviors.TbWidget',
		'bootstrap.widgets.TbDataColumn',
		'bootstrap.widgets.TbActiveForm',
		/*'yiiwheels.widgets.fileupload.WhFileUpload',*/
	    'yiiwheels.widgets.datepicker.WhDatePicker',
		'bootstrap.widgets.TbGridView',
		'bootstrap.widgets.TbGridView1',
		'application.extensions.log4php.*',
		'application.extensions.log4php.renderers.*',
		'application.extensions.log4php.appenders.*',
		'application.extensions.log4php.configurators.*',
		'application.extensions.log4php.filters.*',
		'application.extensions.log4php.helpers.*',
		'application.extensions.log4php.layouts.*',
	
		
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'media'=>array(
        // Base dir for media browser (app/files):
        'baseDir'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'file',
    ),
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'gii',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			
		'generatorPaths'=>array('bootstrap.gii'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// Handling Session
	//	'session' => array (
		//'sessionName' => 'Site Session',
		//'class'=>'CDbHttpSession',
		//'useTransparentSessionID'   =>($_POST['PHPSESSID']) ? true : false,
		//'autoStart' => false,
		//'cookieMode' => 'only',
		//'timeout' => 300,
		//'autoCreateSessionTable'=> false,
		//'connectionID' => 'db', 
		//'sessionTableName' => 'Session', 
		//),
		 // yiistrap configuration
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),
        // yiiwheels configuration
        'yiiwheels' => array(
            'class' => 'yiiwheels.YiiWheels',   
        ),
		
		
		//for mail configuration
		'Smtpmail'=>array(
		
		'class'=>'application.extensions.smtpmail.PHPMailer',
		'Host'=>"smtp-auth.iitb.ac.in",
		'Username'=>'selvarani',
		'Password'=>'selva!23',
		'Mailer'=>'smtp',
		'Port'=>25,
		'SMTPAuth'=>true, 
		'SMTPSecure' => 'tls',
        ),
		
		
		
		
		
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=final_29',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
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