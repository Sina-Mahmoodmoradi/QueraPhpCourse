<?php

require __DIR__ . '/app/bootstrap.php';

$router = new AltoRouter();
$router->addRoutes($routes);
$match = $router->match();
if (!is_array($match)) {
    return false;
}
list($controller, $action) = explode('@', $match['target']);
$controller = new $controller();
call_user_func_array([$controller, $action], $match['params']);
