<?php
    foreach(glob(__DIR__ . '/autoload/*') as $file){
        include($file);
    }
