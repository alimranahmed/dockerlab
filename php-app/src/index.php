<?php

include '../vendor/autoload.php';

use Alimranahmed\PlainPHP\Controllers\HomeController;
use Alimranahmed\PlainPHP\Controllers\StartWarsController;
use Alimranahmed\PlainPHP\Exceptions\HttpNotFound;
use Alimranahmed\PlainPHP\Router;


Router::get('/', HomeController::class);
Router::get('/star-wars', StartWarsController::class);


$path = ltrim(strtolower($_SERVER['REQUEST_URI']), "/");

try {
    Router::handle($path);
} catch (HttpNotFound $e) {
    echo "<h1 style='text-align: center'>404 Not Found</h1>";
}
