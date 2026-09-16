<?php
class Commandes{

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=gestion_commande', 'root', '');
    }

    public function getCommandes(){
        $query = $this->db->prepare("SELECT * FROM commandes JOIN clients ON commandes.idClient = clients.idClient");
        $query->execute();
        return $query->fetchAll();
    }

    public function getCommandeParNum($numCommande) {
        $query = $this->db->prepare("SELECT * FROM commandes JOIN clients ON commandes.idClient = clients.idClient WHERE numCommande = :numCommande");
        $query->execute([':numCommande' => $numCommande]);
        return $query->fetch();
    }

    public function getClients() {
        $query = $this->db->prepare("SELECT idClient, prenom, nom FROM clients");
        $query->execute();
        return $query->fetchAll();
    }
    
    public function ajouterCommande($quantite, $dateLivraison, $statut, $produit, $idClient)
    {
        $query = $this->db->prepare("INSERT INTO `commandes`(`quantite`, `dateLivraison`, `statut`, `produit`, `idClient`) VALUES (:quantite, :date_livraison, :statut, :produit, :idClient)");
        
        $query->execute([
            ':quantite' => $quantite,
            ':date_livraison' => $dateLivraison,
            ':statut' => $statut,
            ':produit' => $produit,
            ':idClient' => $idClient
        ]);
    }

    public function modifierCommande($quantite, $dateLivraison, $statut, $produit, $idClient)
    {
        $query = $this->db->prepare("UPDATE `commandes` SET `quantite` = :quantite, `dateLivraison` = :date_livraison, `statut` = :statut, `produit` = :produit, `idClient` = :idClient WHERE `numCommande` = :numCommande");
        
        $query->execute([
            ':quantite' => $quantite,
            ':date_livraison' => $dateLivraison,
            ':statut' => $statut,
            ':produit' => $produit,
            ':idClient' => $idClient
        ]);
    }

    public function suppCommande($numCommande)
    {
        $query = $this->db->prepare("DELETE FROM `commandes` WHERE `numCommande` = :numCommande");
        $query->execute([
            ':numCommande' => $numCommande
        ]);
    }
}

?>