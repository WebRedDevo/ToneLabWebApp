<?php 

	// FRONT CONTROLLER

	// settengs

	ini_set( 'display_errors', 1 );
	error_reporting( E_ALL );
	
	// includes 

	define('ROOT', dirname(__FILE__));
	define('CORE', ROOT . '/core/');

	require_once(CORE . 'components/Router.php');
	require_once(CORE . 'components/Db.php');
	

	// call Router

	$router = new Router();
	$router->run();






