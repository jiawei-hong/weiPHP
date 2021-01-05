<?php

    class Route{
        static array $routes = [];

        static function get($path, $controller){
            self::process($path, $controller, 'get');
        }

        static function post($path, $controller){
            self::process($path, $controller, 'post');
        }

        static function process($path, $params,$method = 'get'){
            $pattern = preg_replace("/{.[^}$]}/","(.*)",$path);
            $pattern = str_replace('/','\/',$pattern);

            if(!array_key_exists($method,self::$routes)){
                self::$routes[$method] = [];
            }

            array_push(self::$routes[$method], [
                'pattern' => "/^{$pattern}$/",
                'controller' => $params[0],
                'func' => $params[1]
            ]);
        }
    }
