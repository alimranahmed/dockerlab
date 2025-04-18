<?php

include '../vendor/autoload.php';

use Alimranahmed\PlainPHP\Controllers\DeleteTaskController;
use Alimranahmed\PlainPHP\Controllers\HomeController;
use Alimranahmed\PlainPHP\Controllers\StartWarsController;
use Alimranahmed\PlainPHP\Controllers\CreateTaskController;
use Alimranahmed\PlainPHP\Controllers\StoreTaskController;
use Alimranahmed\PlainPHP\Exceptions\HttpNotFound;
use Alimranahmed\PlainPHP\Exceptions\MethodNotAllowed;
use Alimranahmed\PlainPHP\Support\Http\Cors;
use Alimranahmed\PlainPHP\Support\Http\Request;
use Alimranahmed\PlainPHP\Support\Http\Router\Router;

Cors::allowAll();

Router::get('/', HomeController::class);
Router::get('/tasks', CreateTaskController::class);
Router::post('/tasks', StoreTaskController::class);
Router::delete('/tasks', DeleteTaskController::class);
Router::get('/star-wars', StartWarsController::class);


$path = trim(strtolower($_SERVER['REQUEST_URI']), "/");

try {
    Router::handle(Request::instance());
} catch (HttpNotFound $e) {
    echo "<h1 style='text-align: center'>404 Not Found</h1>";
} catch (MethodNotAllowed $e) {
    echo "<h1 style='text-align: center'>Method not allowed</h1>";
}
