<?php
    include(__DIR__ . '/../autoload.php');

    $uri = clearEmpty(explode('/', str_replace('/weiphp', '', $_SERVER['REQUEST_URI'])));
    $uriMethod = strtolower($_SERVER['REQUEST_METHOD']);
    $uriCount = count($uri);
    $isMatch = false;

    foreach(Route::$routes[$uriMethod] as $route){
        $uriPath = str_replace('/weiphp', '', $_SERVER['REQUEST_URI']);
        preg_match($route['pattern'], $uriPath,$matches);

        if(count($matches) > 0){
            $isMatch = true;
            $root = $_SERVER['DOCUMENT_ROOT'] . '/weiphp/';
            include("{$root}{$route['controller']}.php");
            $funcName = $route['func'];

            $x = (new $route['controller'])->$funcName();

            var_dump($x);
        }
    }

    if(!$isMatch)
        http_response_code(404);
