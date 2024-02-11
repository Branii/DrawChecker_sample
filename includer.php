<?php 
spl_autoload_register(function ($class){
    $dirs = [
        'app/database' , 
        'app/exceptions', 
        'app/utils', 
        'app/model/',
        'app/services', 
        'app/checker/',
        'app/games/fiveD/',
        'app/games/mark6/'];
    foreach ($dirs as $dir) {
        $filename = $dir . DIRECTORY_SEPARATOR . $class . '.php';
        if (file_exists($filename)) {
            include $filename;
            return;
        }
    }
});