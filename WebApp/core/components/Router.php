<?php 
	
class Router
{

	private $routes;

	public function __construct()
	{
		$routesPath = CORE . 'config/routes.php';
		$this->routes = include($routesPath);
	}

	/* 
		return request string
	*/ 
	private function getURI()
	{
		if ( !empty($_SERVER['REQUEST_URI']) ) {
			return trim( $_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run()
	{

		// get query line 
		$uri = $this->getURI();

		// check in routes array 
		foreach ( $this->routes as $uriPattern => $path){

			// compare uri width routes
			if ( preg_match("~$uriPattern$~", $uri) ){

				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				

				// define controller and action 
				$segments = explode('/', $internalRoute);

				$controllerName = array_shift($segments) . 'Controller';
				$controllerName = ucfirst($controllerName);

				$actionName = 'action' . ucfirst( array_shift($segments) );

				$parameters = $segments;

				// include class controller 
				$controllerFile = CORE . 'controllers/' . $controllerName . '.php';

				if ( file_exists($controllerFile) ){
					include_once($controllerFile);
				}

				// create Object 
				$controllerObject = new $controllerName;
				$result = call_user_func_array( array( $controllerObject, $actionName), $parameters );

				if ( $result != null ){
					break;
				}
			}
		}


	}
}