<?php

const BASE_DIR = __DIR__ . '/../';
require BASE_DIR . 'functions.php';

spl_autoload_register(function($class){
        require base_path("core/{$class}.php");
});

require base_path('router.php');