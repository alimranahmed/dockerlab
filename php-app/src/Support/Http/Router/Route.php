<?php

namespace Alimranahmed\PlainPHP\Support\Http\Router;

use Alimranahmed\PlainPHP\Support\Http\Method;

readonly class Route
{
    public function __construct(
        public Method $method,
        public string $controller,
    )
    {
    }
}