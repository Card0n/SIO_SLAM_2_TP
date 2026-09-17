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
        require 'view/liste_commandes.php';
    }

    public function ajouterCommande($quantite, $dateLivraison, $statut, $produit, $idClient)
    {
        $this->model->ajouterCommande($quantite, $dateLivraison, $statut, $produit, $idClient);
        header('Location: index.php');
    }

    public function modifierCommande($numCommande, $quantite, $dateLivraison, $statut, $produit, $idClient)
    {
        $this->model->modifierCommande($numCommande, $quantite, $dateLivraison, $statut, $produit, $idClient);
        header('Location: index.php');
    }

    public function suppCommande($numCommande)
    {
        $this->model->suppCommande($numCommande);
        header('Location: index.php');
    }

    public function pageAjout()
    {
        $clients = $this->model->getClients();
        require 'view/ajout.php';
    }

        public function pageModifier($numCommande) {
        $commande = $this->model->getCommandeParNum($numCommande);
        require 'view/modifier.php';
    }

    public function pageDevis($numCommande) {
        $commande = $this->model->getCommandeParNum($numCommande);
        require 'view/devis.php';
    }

}
?>