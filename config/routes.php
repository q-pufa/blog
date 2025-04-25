<?php

/** @var \PHPFramework\Application $app */

use App\Controllers\HomeController;

const MIDDLEWARE = [
    'auth' => \PHPFramework\Middleware\Auth::class,
    'guest' => \PHPFramework\Middleware\Guest::class,
];

$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/post/(?P<slug>[a-z0-9-]+)', [\App\Controllers\PostController::class, 'show']);
$app->router->get('/category/(?P<slug>[a-z0-9-]+)', [\App\Controllers\CategoryController::class, 'show']);
$app->router->get('/search', [\App\Controllers\PostController::class, 'search']);

$app->router->add('/register', [\App\Controllers\UserController::class, 'register'], ['get', 'post'])->only('guest');
$app->router->add('/login', [\App\Controllers\UserController::class, 'login'], ['get', 'post'])->only('guest');
$app->router->get('/logout', [\App\Controllers\UserController::class, 'logout'])->only('auth');