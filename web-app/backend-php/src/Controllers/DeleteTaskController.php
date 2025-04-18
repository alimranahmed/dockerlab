<?php

namespace Alimranahmed\PlainPHP\Controllers;

use Alimranahmed\PlainPHP\Support\DB\MySql;
use Alimranahmed\PlainPHP\Support\Http\Request;

class DeleteTaskController
{
    public function __invoke(Request $request): void
    {
        $db = new MySql();
        $db->execute("DELETE FROM tasks WHERE id = '".$request->get('id')."'");
    }
}