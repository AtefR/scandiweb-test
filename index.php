<?php

declare(strict_types=1);

require_once __DIR__.'/vendor/autoload.php';

use Core\Http\Router;
use Infrastructure\Http\Product\CreateController;
use Infrastructure\Http\Product\DeleteController;
use Infrastructure\Http\Product\IndexController;

$router = new Router();

$router->addRoute('GET', '/', function () {
    echo "Hello world!";
    exit;
});

$router->addRoute('GET', '/products', IndexController::class);

$router->addRoute('POST', '/products', CreateController::class);

$router->addRoute('POST', '/products/delete', DeleteController::class);

$router->matchRoute();
