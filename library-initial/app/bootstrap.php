<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/config.php';
require __DIR__ . '/routes.php';

session_start();

Path::fixRequestURI();

$routes_count = count($routes);
for ($i = 0; $i < $routes_count; ++$i) {
    $routes[] = [$routes[$i][0], $routes[$i][1] . '/', $routes[$i][2]];
}
