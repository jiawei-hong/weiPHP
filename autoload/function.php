<?php
    function test() : void{
        echo 1234;
    }

    function clearEmpty($array): array {
        return array_values(array_filter($array, function($d){
            return $d !== '';
        }));
    }
