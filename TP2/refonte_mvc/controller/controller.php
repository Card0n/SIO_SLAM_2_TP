<?php

require_once '../model/modele.php';
class Controller{

    private $model;

    public function __construct()
    {
        $this ->model = new Commandes();
    }

    public function index()
    {
        $commandes = $this->model->getCommandes();
        require '../view/list_commandes.php';
    }

    public function ajouterCommande($quantite, $dateLivraison, $statut, $produit, $idClient)
    {
        $this->model->ajouterCommande($quantite, $dateLivraison, $statut, $produit, $idClient);
        header('Location: /');
    }

    public function modifierCommande($quantite, $dateLivraison, $statut, $produit, $idClient)
    {
        $this->model->modifierCommande($quantite, $dateLivraison, $statut, $produit, $idClient);
        header('Location: /');
    }

    public function suppCommande($numCommande)
    {
        $this->model->suppCommande($numCommande);
        header('Location: /');
    }

    public function pageAjout()
    {
        $this->model->getClients();
        require '../view/ajout.php';
    }

    public function pageDevis($numCommande) {
        $this->model->getCommande($numCommande);
        require '../view/devis.php';
    }

}
?>