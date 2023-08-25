<?php

const BASE_DIR = __DIR__ . '/../';
require BASE_DIR . 'core/functions.php';

spl_autoload_register(function($class){
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

        require base_path("{$class}.php");
});

require base_path('core/router.php');