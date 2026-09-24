<?php
class Commandes{

    private $db;
    private $prefixe;

    public function __construct(){
        try { 
            $this->db = new PDO('mysql:host=192.168.10.115;dbname=TP_SLAMWEB_2027_elijah', 'webuser2027', '2i27@csd');
            $this->prefixe = "TP2_";
        } catch (PDOException) { 
            $this->db = new PDO('mysql:host=localhost;dbname=gestion_commande', 'root', '');
            // Activation des erreurs 
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
    }

    public function getCommandes()
    {
        $query =$this->db->prepare("SELECT c.*, cl.nom, cl.prenom, s.nomStatut 
                                    FROM {$this->prefixe}commandes c
                                    JOIN {$this->prefixe}clients cl ON c.idClient = cl.idClient
                                    JOIN {$this->prefixe}statut s ON c.idStatut = s.idStatut");
        $query->execute();
        return $query->fetchAll();
    }

    public function getCommandeParNum($numCommande) 
    {
        $query =$this->db->prepare("SELECT * FROM {$this->prefixe}commandes 
                                    JOIN {$this->prefixe}contenir 
                                    ON {$this->prefixe}commandes.numCommande = {$this->prefixe}contenir.numCommande 
                                    WHERE numCommande = :numCommande");//à revoir
        $query->execute([':numCommande' =>$numCommande]);
        return $query->fetch();
    }

    public function getClientsPourCommandes() {
        $query = $this->db->prepare("SELECT idClient, prenom, nom FROM {$this->prefixe}clients");
        $query->execute();
        return $query->fetchAll();
    }

    public function getProduitsPourCommandes() {
        $query = $this->db->prepare("SELECT idProduit, nomProduit FROM {$this->prefixe}produit");
        $query->execute();
        return $query->fetchAll();
    }

    public function getStatutsPourCommandes() {
        $query = $this->db->prepare("SELECT idStatut, nomStatut FROM {$this->prefixe}statut");
        $query->execute();
        return $query->fetchAll();
    }

    //Requetes Clients :
    public function getClients() {
        $query = $this->db->prepare("SELECT * FROM {$this->prefixe}clients");
        $query->execute();
        return $query->fetchAll();
    }

    public function getClientParId($idClient) {
        $query = $this->db->prepare("SELECT * FROM {$this->prefixe}clients WHERE idClient = :idClient");
        $query->execute([':idClient' => $idClient]);
        return $query->fetch();
    }
    

    //Requetes Produits :
    public function getProduits() {
        $query = $this->db->prepare("SELECT * FROM {$this->prefixe}produit");
        $query->execute();
        return $query->fetchAll();
    }

    public function getProduitParId($idProduit) {
        $query = $this->db->prepare("SELECT * FROM {$this->prefixe}produit WHERE idProduit = :idProduit");
        $query->execute([':idProduit' => $idProduit]);
        return $query->fetch();
    }

    //Requetes Statuts :
    public function getStatuts() {
        $query = $this->db->prepare("SELECT * FROM {$this->prefixe}statut");
        $query->execute();
        return $query->fetchAll();
    }
    public function getStatutParId($idStatut) {
        $query = $this->db->prepare("SELECT * FROM {$this->prefixe}statut WHERE idStatut = :idStatut");
        $query->execute([':idStatut' => $idStatut]);
        return $query->fetch();
    }


//Requetes pour l'ajout (INSERT)
    public function ajouterCommande($dateLivraison, $idstatut, $idproduit, $idClient, $quantite)
    {
        $query1 = $this->db->prepare("INSERT INTO `{$this->prefixe}commandes`(`dateLivraison`, `idStatut`, `idProduit`, `idClient`) 
                                    VALUES ( :dateLivraison, :idStatut, :idProduit, :idClient)");
        
        $query->execute([
            ':dateLivraison' => $dateLivraison,
            ':idStatut' => $idStatut,
            ':idproduit' => $idproduit,
            ':idClient' => $idClient,
        ]);

        $lastnum = $this->db->lastInsertId();

        $query2 = $this->db->prepare("INSERT INTO `{$this->prefixe}contenir`(`dateLivraison`, `idStatut`, `idProduit`, `idClient`) 
                                    VALUES ( :dateLivraison, :idStatut, :idProduit, :idClient)");

        $query2->execute([
            ':numCommande' => $lastnum,
            ':idproduit' => $idproduit
        ]);
    }

    public function ajouterClient($prenom, $nom, $telephone, $mail, $adresse, $codePostal)
    {
        $query = $this->db->prepare("INSERT INTO `{$this->prefixe}clients`(`prenom`, `nom`, `telephone`, `mail`, `adresse`, `codePostal`) VALUES (:prenom, :nom, :telephone, :mail, :adresse, :codePostal)");
        
        $query->execute([
            ':prenom' => $prenom,
            ':nom' => $nom,
            ':telephone' => $telephone,
            ':mail' => $mail,
            ':adresse' => $adresse,
            ':codePostal' => $codePostal
        ]);
    }

    public function ajouterProduit($nomProduit, $prixUnitaire)
    {
        $query = $this->db->prepare("INSERT INTO `{$this->prefixe}produit`(`nomProduit`, `prixUnitaire`) VALUES (:nomProduit, :prixUnitaire)");
        
        $query->execute([
            ':nomProduit' => $nomProduit,
            ':prixUnitaire' => $prixUnitaire
        ]);
    }
    
    public function ajouterStatut($nomStatut)
    {
        $query = $this->db->prepare("INSERT INTO `{$this->prefixe}statut`(`nomStatut`) VALUES (:nomStatut)");
        
        $query->execute([
            ':nomStatut' => $nomStatut
        ]);
    }


//Requetes pour la modification (UPDATE)
    public function modifierCommande($numCommande, $dateLivraison, $statut, $produit, $idClient)
    {
        $query = $this->db->prepare("UPDATE `{$this->prefixe}commandes` SET `dateLivraison` = :dateLivraison, `statut` = :statut, `produit` = :produit, `idClient` = :idClient WHERE `numCommande` = :numCommande");
        
        $query->execute([
            ':numCommande' => $numCommande,
            ':dateLivraison' => $dateLivraison,
            ':statut' => $statut,
            ':produit' => $produit,
            ':idClient' => $idClient
        ]);

        
    }

    public function modifierClient($idClient, $prenom, $nom, $telephone, $mail, $adresse, $codePostal)
    {
        $query = $this->db->prepare("UPDATE `{$this->prefixe}clients` SET `prenom` = :prenom, `nom` = :nom, `telephone` = :telephone, `mail` = :mail, `adresse` = :adresse, `codePostal` = :codePostal WHERE `idClient` = :idClient");
        
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

    public function modifierProduit($idProduit, $nomProduit, $prixUnitaire)
    {
        $query = $this->db->prepare("UPDATE `{$this->prefixe}produit` SET `nomProduit` = :nomProduit, `prixUnitaire` = :prixUnitaire WHERE `idProduit` = :idProduit");
        
        $query->execute([
            ':idProduit' => $idProduit,
            ':nomProduit' => $nomProduit,
            ':prixUnitaire' => $prixUnitaire
        ]);
    }

    public function modifierStatut($idStatut, $nom)
    {
        $query = $this->db->prepare("UPDATE `{$this->prefixe}statut` SET `nomStatut` = :nom WHERE `idStatut` = :idStatut");
        
        $query->execute([
            ':idStatut' => $idStatut,
            ':nom' => $nom
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

    public function suppClient($idClient)
    {
        $query = $this->db->prepare("DELETE FROM `{$this->prefixe}clients` WHERE `idClient` = :idClient");
        $query->execute([
            ':idClient' => $idClient
        ]);
    }

    public function suppProduit($idProduit)
    {
        $query = $this->db->prepare("DELETE FROM `{$this->prefixe}produit` WHERE `idProduit` = :idProduit");
        $query->execute([
            ':idProduit' => $idProduit
        ]);
    }

    public function suppStatut($idStatut)
    {
        $query = $this->db->prepare("DELETE FROM `{$this->prefixe}statut` WHERE `idStatut` = :idStatut");
        $query->execute([
            ':idStatut' => $idStatut
        ]);
    }
}
