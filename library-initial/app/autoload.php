<?php

require __DIR__ . '/helpers/redirect.php';

spl_autoload_register(function ($class_name) {
    $directories = [
        '',
        'Models',
        'Controllers',
        'helpers'
    ];
    foreach ($directories as $directory) {
        $path = __DIR__ . '/' . $directory . ($directory != '' ? '/' : '') . $class_name . '.php';
        if (is_file($path)) {
            include $path;
        }
    }
});
