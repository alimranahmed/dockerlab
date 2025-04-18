<?php

namespace Alimranahmed\PlainPHP\Controllers;

use Alimranahmed\PlainPHP\Support\DB\MySql;
use Alimranahmed\PlainPHP\Support\Http\Request;

class TaskListController
{
    public function __invoke(Request $request): void
    {
        $tasks = (new MySql())->select('select * from tasks');
        header('Content-Type: application/json');
        echo json_encode($tasks);
    }
}