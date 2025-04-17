<?php

namespace Alimranahmed\PlainPHP\Controllers;

class HomeController
{
    public function __invoke(): void
    {
        echo "<h1 style='text-align: center'>Hello world!</h1>";
    }
}