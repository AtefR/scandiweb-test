<?php

declare(strict_types=1);

namespace Core\Database;

use mysqli;

class Database
{
    private $connection;

    function __construct()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->connection->set_charset('utf8mb4');

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection(): mysqli
    {
        return $this->connection;
    }
}