<?php

namespace Alimranahmed\PlainPHP\Controllers;

use Alimranahmed\PlainPHP\Support\DB\MySql;
use Alimranahmed\PlainPHP\Support\Http\Request;

class StoreTaskController
{
    public function __invoke(Request $request): void
    {
        $mysql = new MySql();
        $name = $request->get('task');
        $mysql->execute("INSERT INTO tasks (name) VALUES('$name')");

        error_log('Tasks created', 3, '/app/logs/tasks.log');

        header('Content-Type: application/json');
        echo json_encode(['message' => 'Task added successfully']);
    }
}