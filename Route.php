<?php

    class Route{
        static array $routes = [];

        static function get($path, $controller){
            self::process($path, $controller, 'get');
        }

        static function post($path, $controller){
            self::process($path, $controller, 'post');
        }

        static function process($path, $controller ,$method = 'get'){
            if(!array_key_exists($method,self::$routes)){
               self::$routes[$method] = [
                   'path' => []
               ];
            }

            array_push(self::$routes[$method]['path'], $path);
        }
    }
