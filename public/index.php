<?php
    include(__DIR__ . '/../autoload.php');

    $uri = clearEmpty(explode('/', str_replace('/weiphp', '', $_SERVER['REQUEST_URI'])));
    $uriMethod = strtolower($_SERVER['REQUEST_METHOD']);
    $uriCount = count($uri);

    foreach(Route::$routes[$uriMethod]['path'] as $files){
        $path = clearEmpty(explode('/', $files));
        $pathCount = count($path);
        $pathCorrect = false;

        if($pathCount == $uriCount){
            for($i=0;$i< count($uri);$i++){
                $hasBigBraces = str_contains($path[$i], '{') && str_contains($path[$i], '}');

                // 還沒寫路由匹配 ...
            }
        }
    }
