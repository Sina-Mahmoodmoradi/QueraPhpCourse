<?php

require __DIR__ . '/app/bootstrap.php';

$router = new Router();
$router->addRoutes($routes);
$matches = $router->matches();
if (empty($matches)) {
    return false;
}
foreach ($matches as $match) {
    list($controller, $action) = explode('@', $match['target']);
    $controller = new $controller();
    $response = call_user_func_array([$controller, $action], $match['params']);
    if (!$response) {
        break;
    }
}
