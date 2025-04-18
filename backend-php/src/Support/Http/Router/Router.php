<?php
namespace Alimranahmed\PlainPHP\Support\Http\Router;

use Alimranahmed\PlainPHP\Exceptions\HttpNotFound;
use Alimranahmed\PlainPHP\Exceptions\MethodNotAllowed;
use Alimranahmed\PlainPHP\Support\Http\Method;
use Alimranahmed\PlainPHP\Support\Http\Request;

class Router
{
    private static ?Router $instance = null;

    /** @var array<Route>*/
    private array $routes = [
        METHOD::GET->name => [],
        METHOD::POST->name => [],
    ];

    private function __construct()
    {
    }

    public static function instance(): Router
    {
        if (self::$instance !== null) {
            return self::$instance;
        }
        self::$instance = new Router();
        return self::$instance;
    }

    public static function get(string $path, string $controller): void
    {
        self::instance()->routes[Method::GET->name][self::cleanPath($path)] = new Route(Method::GET, $controller);
    }

    public static function post(string $path, string $controller): void
    {
        self::instance()->routes[Method::POST->name][self::cleanPath($path)] = new Route(Method::POST, $controller);
    }

    public static function delete(string $path, string $controller): void
    {
        self::instance()->routes[Method::DELETE->name][self::cleanPath($path)] = new Route(Method::DELETE, $controller);
    }

    public static function put(string $path, string $controller): void
    {
        self::instance()->routes[Method::PUT->name][self::cleanPath($path)] = new Route(Method::PUT, $controller);
    }

    public static function handle(Request $request): void
    {
        $path = self::cleanPath($request->getUri()->getPath());
        $routes = self::instance()->routes;

        if ($request->getMethod() === Method::GET->name) {
            if (array_key_exists($path, $routes[Method::GET->name])) {
                $controller = $routes[Method::GET->name][$path]->controller;
                (new $controller)->__invoke($request);
                return;
            }
        } else if ($request->getMethod() === Method::POST->name) {
            if (array_key_exists($path, $routes[Method::POST->name])) {
                $controller = $routes[Method::POST->name][$path]->controller;
                (new $controller)->__invoke($request);
                return;
            }
        } else if ($request->getMethod() === Method::DELETE->name) {
            if (array_key_exists($path, $routes[Method::DELETE->name])) {
                $controller = $routes[Method::DELETE->name][$path]->controller;
                (new $controller)->__invoke($request);
                return;
            }
        } else if ($request->getMethod() === Method::PUT->name) {
            if (array_key_exists($path, $routes[Method::PUT->name])) {
                $controller = $routes[Method::PUT->name][$path]->controller;
                (new $controller)->__invoke($request);
                return;
            }
        } else {
            throw new MethodNotAllowed();
        }
        throw new HttpNotFound();

    }

    private static function cleanPath(string $path): string
    {
        return strtolower(trim($path, '/'));
    }
}