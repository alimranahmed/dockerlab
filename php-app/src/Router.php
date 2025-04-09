<?php
namespace Alimranahmed\PlainPHP;

use Alimranahmed\PlainPHP\Exceptions\HttpNotFound;

class Router
{
    private static array $routes = [];

    public static function get(string $path, string $controller): void
    {
        self::$routes[self::cleanPath($path)] = ['get', $controller];
    }

    public static function handle(string $path): void
    {
        $path = self::cleanPath($path);
        if (array_key_exists($path, self::$routes)) {
            (new self::$routes[$path][1])->__invoke();
        } else {
            throw new HttpNotFound();
        }
    }

    private static function cleanPath(string $path): string
    {
        return strtolower(trim($path, '/'));
    }
}