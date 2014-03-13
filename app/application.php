<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Slim\Slim;

$twigView = new \Slim\Views\Twig();

$app = new \Slim\Slim(array(
	'mode'				=> 'development',
	'debug'				=> TRUE,
	'view'				=> $twigView,
	'templates.path'	=> __DIR__.'/views/'
));

$view = $app->view();
$view->parserOptions = array(
  'debug' => true,
  'cache' => dirname(__FILE__) . '/cache'
);

$view->parserExtensions = array(
  new \Slim\Views\TwigExtension(),
);

/* Connect to Eloquent ORM */
$capsule = new Capsule;
$capsule->addConnection( array(
	'driver'	=>	'mysql',
	'host'		=>	'127.0.0.1',
	'database'	=>	'multicreditos',
	'username'	=>	'root',
	'password'	=>	'root',
	'collation'	=>	'utf8_general_ci',
	'charset'   => 	'utf8',
	'prefix'	=>	''
));

$capsule->bootEloquent();
$capsule->setAsGlobal();