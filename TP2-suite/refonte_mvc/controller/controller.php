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

//requete pour les commandes
    public function ajouterCommande($dateLivraison, $statut, $produit, $idClient)
    {
        $this->model->ajouterCommande($dateLivraison, $statut, $produit, $idClient);
        header('Location: index.php');
    }

    public function modifierCommande($numCommande, $dateLivraison, $statut, $produit, $idClient)
    {
        $this->model->modifierCommande($numCommande, $dateLivraison, $statut, $produit, $idClient);
        header('Location: index.php');
    }

    public function suppCommande($numCommande)
    {
        $this->model->suppCommande($numCommande);
        header('Location: index.php');
    }

//redirection vers les pages avec leur paramètres requis
    //Pages commandes :
    public function pageAjoutCommande()
    {
        $clients = $this->model->getClientsPourCommandes();
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
}