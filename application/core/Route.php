<?php

class Route
{
	static function start()
	{
		$request = $_SERVER['REQUEST_URI'];
		$request = trim($request, '/');
		$request_assoc = explode('/', $request);

        $controllerName = ucwords(strtolower($request_assoc[0]));

        $controllerFile = "application/controllers/Controller".$controllerName.'.php';

        if (count($request_assoc) === 1 && file_exists($controllerFile)) {

            require $controllerFile;

            switch ($controllerName) {
//                case 'Register':
//                case 'Profile':
//                    $modelName = 'ModelMain';
//                    break;
                default:
                    $modelName = 'ModelMain';
            }

            if(file_exists("application/models/".$modelName.'.php')) {
                require "application/models/".$modelName.'.php';
            }

            $actionName = 'action'.$controllerName;

            $controllerName = 'Controller'.$controllerName;

            $controller = new $controllerName($modelName);

            if(method_exists($controller, $actionName)) {
                $controller->$actionName();
            }

        } else {
            header('HTTP/1.0 400 Bad Request');
            header('Location: /register');
        }

	}

    static function debug($value) {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }
}