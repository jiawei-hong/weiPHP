<?php
    function dd(...$args){
        var_dump($args);
        exit;
    }

    function clearEmpty($array): array {
        return array_values(array_filter($array, function($d){
            return $d !== '';
        }));
    }
