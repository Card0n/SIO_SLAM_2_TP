<?php
class Commandes{

    private $db;
    private $prefixe;

    public function __construct(){
        try { 
            $this->db = new PDO('mysql:host=localhost;dbname=gestion_commande', 'root', '');
            // Activation des erreurs 
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException) { 
            $this->db = new PDO('mysql:host=192.168.10.115;dbname=TP_SLAMWEB_2027_elijah', 'webuser2027', '2i27@csd');
            $this->prefixe = "TP2_";
        } 
    }


//Requetes pour la récupération des données (GET)
    //Requetes Commandes
    public function getCommandes(){
        $query = $this->db->prepare("SELECT * FROM {$this->prefixe}commandes JOIN {$this->prefixe}clients ON {$this->prefixe}commandes.idClient = {$this->prefixe}clients.idClient");
        $query->execute();
        return $query->fetchAll();
    }

    public function getCommandeParNum($numCommande) {
        $query = $this->db->prepare("SELECT * FROM {$this->prefixe}commandes JOIN {$this->prefixe}clients ON {$this->prefixe}commandes.idClient = {$this->prefixe}clients.idClient WHERE numCommande = :numCommande");
        $query->execute([':numCommande' => $numCommande]);
        return $query->fetch();
    }

    public function getClientsPourCommandes() {
        $query = $this->db->prepare("SELECT idClient, prenom, nom FROM {$this->prefixe}clients");
        $query->execute();
        return $query->fetchAll();
    }

    //Requetes Clients :
    public function getClients() {
        $query = $this->db->prepare("SELECT * FROM {$this->prefixe}clients");
        $query->execute();
        return $query->fetchAll();
    }

//Requetes pour l'ajout (INSERT)
    public function ajouterCommande($dateLivraison, $statut, $produit, $idClient)
    {
        $query = $this->db->prepare("INSERT INTO `{$this->prefixe}commandes`(`dateLivraison`, `statut`, `produit`, `idClient`) VALUES (:date_livraison, :statut, :produit, :idClient)");
        
        $query->execute([
            ':date_livraison' => $dateLivraison,
            ':statut' => $statut,
            ':produit' => $produit,
            ':idClient' => $idClient
        ]);
    }


//Requetes pour la modification (UPDATE)
    public function modifierCommande($numCommande, $dateLivraison, $statut, $produit, $idClient)
    {
        $query = $this->db->prepare("UPDATE `{$this->prefixe}commandes` SET `dateLivraison` = :date_livraison, `statut` = :statut, `produit` = :produit, `idClient` = :idClient WHERE `numCommande` = :numCommande");
        
        $query->execute([
            ':numCommande' => $numCommande,
            ':date_livraison' => $dateLivraison,
            ':statut' => $statut,
            ':produit' => $produit,
            ':idClient' => $idClient
        ]);
    }


//Requetes pour la suppression (DELETE)
    public function suppCommande($numCommande)
    {
        $query = $this->db->prepare("DELETE FROM `{$this->prefixe}commandes` WHERE `numCommande` = :numCommande");
        $query->execute([
            ':numCommande' => $numCommande
        ]);
    }
}

?>