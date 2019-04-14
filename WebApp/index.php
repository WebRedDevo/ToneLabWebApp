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
	require_once(CORE . 'components/User.php');
	require_once(CORE . 'components/Calendar.php');
	
	
	// check autoriztion call Router
	if(isset($_COOKIE['login'])){
		$router = new Router();
		$router->run();	
		echo $_COOKIE['login'] === 'Руслан';
	}else{
		require_once( ROOT . '/template/login.php' );
		$user = new User;
		$user->getCheckUser();	
	}
	


	



