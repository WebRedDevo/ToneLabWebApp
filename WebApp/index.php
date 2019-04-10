<?php 

	// FRONT CONTROLLER

	// settengs

	ini_set( 'display_errors', 1 );
	error_reporting( E_ALL );
	
	// includes 

	define('ROOT', dirname(__FILE__));
	define('CORE', ROOT . '/core/');

	require_once(CORE . 'components/Router.php');
	

	// call Router

	$router = new Router();
	$router->run();





  if($_SERVER['REQUEST_URI'] === '/ton/1'){

    include_once 'order-page.php';

  }elseif($_SERVER['REQUEST_URI'] === '/ton/add'){

    include_once 'order-form.php';

  }else{

    include_once 'main.php';

  }

