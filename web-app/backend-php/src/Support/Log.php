<?php
namespace Alimranahmed\PlainPHP\Support;

class Log
{
    public static function info(string $message, $path = '/app/logs/tasks.log'): void
    {
        error_log("$message\n", 3, $path);
    }
}