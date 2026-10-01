<?php

namespace App\Repository;

use App\Service\Database;

class TaskRepository
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function findAll(): array
    {
        $stmt = $this->database->getPdo()->query('SELECT * FROM TP4_task');

        return $stmt->fetchAll();
    }
}