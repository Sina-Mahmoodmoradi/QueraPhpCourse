<?php


spl_autoload_register(function ($class_name) {
    $file_path = __DIR__ . '/' . $class_name . '.php';
    if (is_file($file_path)) {
        include $file_path;
    }
});
