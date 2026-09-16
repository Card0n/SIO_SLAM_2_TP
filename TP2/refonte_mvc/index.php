<?php
require_once 'controller/controller.php';

$controller = new Controller();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'ajouter') {
        $controller->ajouterCommande($_POST['quantite'], $_POST['date_livraison'], $_POST['statut'], $_POST['produit'], $_POST['client']);
    } 
    elseif (isset($_POST['action']) && $_POST['action'] === 'modifier') {
        $controller->modifierCommande($_POST['numCommande'], $_POST['quantite'], $_POST['dateLivraison'], $_POST['statut'], $_POST['produit'], $_POST['idClient']);
    }
} 
elseif (isset($_GET['action'])) {
    if ($_GET['action'] === 'ajout') {
        $controller->pageAjout();
    } 
    elseif ($_GET['action'] === 'modifier' && isset($_GET['numCommande'])) {
        $controller->pageModifier($_GET['numCommande']);
    } 
    elseif ($_GET['action'] === 'supprimer' && isset($_GET['numCommande'])) {
        $controller->suppCommande($_GET['numCommande']);
    }
} 
else {
    $controller->index();
}
?>