<?php

namespace Alimranahmed\PlainPHP\Controllers;

use Alimranahmed\PlainPHP\Support\Http\Request;

class CreateTaskController
{
    public function __invoke(Request $request): void
    {
        require_once __DIR__.'/../Views/tasks.php';
    }
}