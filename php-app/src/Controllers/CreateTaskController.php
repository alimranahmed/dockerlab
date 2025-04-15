<?php

namespace Alimranahmed\PlainPHP\Controllers;

use Alimranahmed\PlainPHP\Support\DB\MySql;
use Alimranahmed\PlainPHP\Support\Http\Request;

class CreateTaskController
{
    public function __invoke(Request $request): void
    {
        $tasks = (new MySql())->select('select * from tasks');
        $tasks = array_map(fn ($task) => $task['name'], $tasks);

        header('Content-Type: application/json');
        echo json_encode($tasks);
    }
}