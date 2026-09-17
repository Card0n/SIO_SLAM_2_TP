<?php
class Commandes{

    private $db;

    public function __construct(){
        //$this->db = new PDO('mysql:host=localhost;dbname=gestion_commande', 'root', '');
        $this->db = new PDO('mysql:host=192.168.10.115;dbname=TP_SLAMWEB_2027_elijah', 'webuser2027', '2i27@csd');
    }

    public function getCommandes(){
        $query = $this->db->prepare("SELECT * FROM TP2_commandes JOIN TP2_clients ON TP2_commandes.idClient = TP2_clients.idClient");
        $query->execute();
        return $query->fetchAll();
    }

    public function getCommandeParNum($numCommande) {
        $query = $this->db->prepare("SELECT * FROM TP2_commandes JOIN TP2_clients ON TP2_commandes.idClient = TP2_clients.idClient WHERE numCommande = :numCommande");
        $query->execute([':numCommande' => $numCommande]);
        return $query->fetch();
    }

    public function getClients() {
        $query = $this->db->prepare("SELECT idClient, prenom, nom FROM TP2_clients");
        $query->execute();
        return $query->fetchAll();
    }
    
    public function ajouterCommande($quantite, $dateLivraison, $statut, $produit, $idClient)
    {
        $query = $this->db->prepare("INSERT INTO `TP2_commandes`(`quantite`, `dateLivraison`, `statut`, `produit`, `idClient`) VALUES (:quantite, :date_livraison, :statut, :produit, :idClient)");
        
        $query->execute([
            ':quantite' => $quantite,
            ':date_livraison' => $dateLivraison,
            ':statut' => $statut,
            ':produit' => $produit,
            ':idClient' => $idClient
        ]);
    }

    public function modifierCommande($numCommande, $quantite, $dateLivraison, $statut, $produit, $idClient)
    {
        $query = $this->db->prepare("UPDATE `TP2_commandes` SET `quantite` = :quantite, `dateLivraison` = :date_livraison, `statut` = :statut, `produit` = :produit, `idClient` = :idClient WHERE `numCommande` = :numCommande");
        
        $query->execute([
            ':numCommande' => $numCommande,
            ':quantite' => $quantite,
            ':date_livraison' => $dateLivraison,
            ':statut' => $statut,
            ':produit' => $produit,
            ':idClient' => $idClient
        ]);
    }

    public function suppCommande($numCommande)
    {
        $query = $this->db->prepare("DELETE FROM `TP2_commandes` WHERE `numCommande` = :numCommande");
        $query->execute([
            ':numCommande' => $numCommande
        ]);
    }
}

?>