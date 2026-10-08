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
        $stmt = $this->database->getPdo()->query('SELECT * FROM TP2_clients');

        return $stmt->fetchAll();
    }

    public function getClientParId($idClient) 
    {
        $query = $this->database->getPdo()->prepare("SELECT * FROM TP2_clients WHERE idClient = :idClient");
        $query->execute([':idClient' => $idClient]);

        return $query->fetch();
    }

    public function ajouterClient($prenom, $nom, $telephone, $mail, $adresse, $codePostal)
    {
        $query = $this->database->getPdo()->prepare("INSERT INTO `TP2_clients`(`prenom`, `nom`, `telephone`, `mail`, `adresse`, `codePostal`) VALUES (:prenom, :nom, :telephone, :mail, :adresse, :codePostal)");
        
        $query->execute([
            ':prenom' => $prenom,
            ':nom' => $nom,
            ':telephone' => $telephone,
            ':mail' => $mail,
            ':adresse' => $adresse,
            ':codePostal' => $codePostal
        ]);
    }


    public function modifierClient($idClient, $prenom, $nom, $telephone, $mail, $adresse, $codePostal)
    {
        $query = $this->database->getPdo()->prepare("UPDATE `TP2_clients` SET `prenom` = :prenom, `nom` = :nom, `telephone` = :telephone, `mail` = :mail, `adresse` = :adresse, `codePostal` = :codePostal WHERE `idClient` = :idClient");
        
        $query->execute([
            ':idClient' => $idClient,
            ':prenom' => $prenom,
            ':nom' => $nom,
            ':telephone' => $telephone,
            ':mail' => $mail,
            ':adresse' => $adresse,
            ':codePostal' => $codePostal
        ]);
    }



    public function suppClient($idClient) {

        $query = $this->database->getPdo()->prepare("DELETE * FROM TP2_clients WHERE idClient = :idClient");
        $query->execute([':idClient' => $idClient]);
        
        return $query->fetch();
    }
}