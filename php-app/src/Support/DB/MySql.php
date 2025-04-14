<?php

namespace Alimranahmed\PlainPHP\Support\DB;

use PDO;

class MySql
{
    private static ?PDO $connection = null;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "phplab";

        if (self::$connection === null) {
            self::$connection = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public function execute(string $sql): void
    {
        self::$connection->exec($sql);
    }

    public function select(string $sql): ?array
    {
        $statement = self::$connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $data = [];
        foreach($statement->fetchAll() as $key => $value) {
            $data[$key] = $value;
        }
        return $data;
    }
}