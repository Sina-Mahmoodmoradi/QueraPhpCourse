<?php

require __DIR__ . '/config.php';
require __DIR__ . '/routes.php';

session_start();

Path::fixRequestURI();

//$routes_count = count($routes);
//$new_routes = [];
//for ($i = 0; $i < $routes_count; ++$i) {
//    if (strpos($routes[$i][2], 'AuthController') !== 0 && strpos($routes[$i][2], 'AuthMiddleware') !== 0) {
//        $new_routes[] = [$routes[$i][0], $routes[$i][1] . '/', 'AuthMiddleware@check'];
//    }
//    $new_routes[] = [$routes[$i][0], $routes[$i][1] . '/', $routes[$i][2]];
//}
//$routes = $new_routes;
$routes_count = count($routes);
for ($i = 0; $i < $routes_count; ++$i) {
    $routes[] = [$routes[$i][0], $routes[$i][1] . '/', $routes[$i][2]];
}
