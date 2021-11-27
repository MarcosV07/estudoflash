<?php

$router = new SON\Router;

$router['/'] = [
    'class' => App\Controllers\UsersController::class,
    'action' => 'index'
];

$router['/cliente'] = [
    'class' => App\Controllers\UsersController::class,
    'action' => 'create'
];

return $router;
