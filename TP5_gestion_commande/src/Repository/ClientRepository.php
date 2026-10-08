<?php

namespace App\Repository;

use App\Service\Database;

class ClientRepository
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function findAll(): array
    {
        $stmt = $this->database->getPdo()->query('SELECT * FROM clients');

        return $stmt->fetchAll();
    }

    public function getClientParId($idClient) {
        $query = $this->database->getPdo()->prepare("SELECT * FROM clients WHERE idClient = :idClient");
        $query->execute([':idClient' => $idClient]);
        return $query->fetch();
    }
}