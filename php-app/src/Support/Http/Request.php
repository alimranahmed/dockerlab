<?php

namespace Alimranahmed\PlainPHP\Support\Http;

use Nyholm\Psr7\Request as Psr7Request;
use Nyholm\Psr7\Stream;

class Request extends Psr7Request
{
    public static ?Request $instance = null;

    private function __construct(string $method, $uri, array $headers = [], $body = null, string $version = '1.1')
    {
        parent::__construct($method, $uri, $headers, $body, $version);
    }

    public static function instance(): Request
    {
        if (self::$instance !== null) {
            return self::$instance;
        }

        $instance = new self(
            $_SERVER['REQUEST_METHOD'],
            trim(strtolower($_SERVER['REQUEST_URI'])),
            [],
            Stream::create(json_encode([...$_GET, ...$_POST]))
        );

        self::$instance = $instance;
        return $instance;
    }

    public function all()
    {
        return json_decode($this->getBody()->getContents(), true);
    }

    public function get(string $key)
    {
        return $this->all()[$key] ?? null;
    }
}