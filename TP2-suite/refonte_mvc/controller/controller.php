<?php

require_once 'model/modele.php';
class Controller{

    private $model;

    public function __construct()
    {
        $this ->model = new Commandes();
    }

    public function index()
    {
        $commandes = $this->model->getCommandes();
        require 'view/commandes/liste_commandes.php';
    }

//Requetes pour les commandes
    public function ajouterCommande($dateLivraison, $idstatut, $idproduit, $idClient, $quantite)
    {
        $this->model->ajouterCommande($dateLivraison, $idstatut, $idproduit, $idClient, $quantite);
        header('Location: index.php');
    }

    public function modifierCommande($numCommande, $dateLivraison, $idstatut, $idproduit, $idClient, $quantite)
    {
        $this->model->modifierCommande($numCommande, $dateLivraison, $idstatut, $idproduit, $idClient, $quantite);
        header('Location: index.php');
    }

    public function suppCommande($numCommande)
    {
        $this->model->suppCommande($numCommande);
        header('Location: index.php');
    }

//Requetes pour les clients

    public function listeClients() {
        $clients = $this->model->getClients();
        require 'view/clients/liste_clients.php';
    }

    public function ajouterClient($prenom, $nom, $telephone, $mail, $adresse, $codePostal)
    {
        $this->model->ajouterClient($prenom, $nom, $telephone, $mail, $adresse, $codePostal);
        header('Location: index.php?action=listeClients');
    }

    public function modifierClient($idClient, $prenom, $nom, $telephone, $mail, $adresse, $codePostal)
    {
        $this->model->modifierClient($idClient, $prenom, $nom, $telephone, $mail, $adresse, $codePostal);
        header('Location: index.php?action=listeClients');
    }

    public function suppClient($idClient)
    {
        $this->model->suppClient($idClient);
        header('Location: index.php?action=listeClients');
    }


//Requetes pour les produits

    public function ajouterProduit($nomProduit, $prixUnitaire)
    {
        $this->model->ajouterProduit($nomProduit, $prixUnitaire);
        header('Location: index.php?action=listeProduits');
    }

    public function modifierProduit($idProduit, $nomProduit, $prixUnitaire)
    {
        $this->model->modifierProduit($idProduit, $nomProduit, $prixUnitaire);
        header('Location: index.php?action=listeProduits');
    }

    public function suppProduit($idProduit)
    {
        $this->model->suppProduit($idProduit);
        header('Location: index.php?action=listeProduits');
    }


//Requetes pour les statuts

    public function ajouterStatut($nomStatut)
    {
        $this->model->ajouterStatut($nomStatut);
        header('Location: index.php?action=listeStatut');
    }

    public function modifierStatut($idStatut, $nomStatut)
    {
        $this->model->modifierStatut($idStatut, $nomStatut);
        header('Location: index.php?action=listeStatut');
    }

    public function suppStatut($idStatut)
    {
        $this->model->suppStatut($idStatut);
        header('Location: index.php?action=listeStatut');
    }

//Redirection vers les pages avec leur parametres requis
    //Pages commandes :
    public function pageAjoutCommande()
    {
        $clients = $this->model->getClientsPourCommandes();
        $statuts = $this->model->getStatutsPourCommandes();
        $produits = $this->model->getProduitsPourCommandes();
        require 'view/commandes/ajout_commande.php';
    }

        public function pageModifierCommande($numCommande) {
        $commande = $this->model->getCommandeParNum($numCommande);
        require 'view/commandes/modifier_commande.php';
    }

    public function pageDevis($numCommande) {
        $commande = $this->model->getCommandeParNum($numCommande);
        require 'view/commandes/devis.php';
    }

    //Pages clients :
    public function pageAjoutClient()
    {
        require 'view/clients/ajout_client.php';
    }

    public function pageModifierClient($idClient) 
    {
        $client = $this->model->getClientParId($idClient);
        require 'view/clients/modifier_client.php';
    }

    //Pages produits :
    public function listeProduits() {
        $produits = $this->model->getProduits();
        require 'view/produit/liste_produit.php';
    }

    public function pageAjoutProduit()
    {
        require 'view/produit/ajout_produit.php';
    }

    public function pageModifierProduit($idProduit) 
    {
        $produit = $this->model->getProduitParId($idProduit);
        require 'view/produit/modifier_produit.php';
    }

    //Pages statuts :
    public function listeStatut() {
        $statuts = $this->model->getStatuts();
        require 'view/statut/liste_statut.php';
    }
    public function pageAjoutStatut()
    {
        require 'view/statut/ajout_statut.php';
    }
    public function pageModifierStatut($idStatut) 
    {
        $statut = $this->model->getStatutParId($idStatut);
        require 'view/statut/modifier_statut.php';
    }
}