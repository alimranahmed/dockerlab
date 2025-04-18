<?php

namespace Alimranahmed\PlainPHP\Support\Http;

class Cors
{
    public static function allowAll(): void
    {
        // Allow from any origin
        header("Access-Control-Allow-Origin: *");

        // Optional: Specify allowed methods
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        // Optional: Specify allowed headers
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
    }
}