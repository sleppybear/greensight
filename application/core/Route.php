<?php

class Route
{
	static function start()
	{
		$request = $_SERVER['REQUEST_URI'];
		$request = trim($request, '/');
		$request_assoc = explode('/', $request);

        $controllerName = ucwords(strtolower($request_assoc[0]));

        $actionName = 'action'.$controllerName;
        $modelName = 'Model'.$controllerName;
        $controllerName = 'Controller'.$controllerName;

        if(file_exists("application/models/".$modelName.'.php')) {
            include "application/models/".$modelName.'.php';
        }

        if(file_exists("application/controllers/".$controllerName.'.php')) {
            include "application/controllers/".$controllerName.'.php';
        }

        $controller = new $controllerName($modelName);

        if(method_exists($controller, $actionName)) {
            $controller->$actionName();
        }

//		if (count($request_assoc) === 1 && file_exists($controllerName)) {
//
//		} else {
////		    header('Location: /');
////            header('HTTP/1.0 400 Bad Request');
////            echo json_encode(array(
////                'error' => 'Bad Request'
////            ));
//            die();
//        }
	}

//	static function ErrorPage404()
//	{
//        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
//        header('HTTP/1.1 404 Not Found');
//		header("Status: 404 Not Found");
//		header('Location:'.$host.'404');
//    }

    static function debug($value) {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }
}