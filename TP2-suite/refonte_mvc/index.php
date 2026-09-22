<?php
require_once 'controller/controller.php';

$controller = new Controller();

if ($_SERVER['REQUEST_METHOD'] === 'POST') //Action effectuer selon le formulaire
{
    if (isset($_POST['action']) && $_POST['action'] === 'ajouter') 
    {
        $controller->ajouterCommande($_POST['date_livraison'], $_POST['statut'], $_POST['produit'], $_POST['client']);
    }
    elseif (isset($_POST['action']) && $_POST['action'] === 'modifier') 
    {
        $controller->modifierCommande($_POST['numCommande'], $_POST['dateLivraison'], $_POST['statut'], $_POST['produit'], $_POST['idClient']);
    }
} 
elseif (isset($_GET['action'])) //Action effectuer selon l'URL (donc bouton cliquer)
{
    if ($_GET['action'] === 'ajout') 
    {
        $controller->pageAjoutCommande();
    } 
    elseif ($_GET['action'] === 'modifier' && isset($_GET['numCommande'])) 
    {
        $controller->pageModifierCommande($_GET['numCommande']);
    } 
    elseif ($_GET['action'] === 'supprimer' && isset($_GET['numCommande'])) 
    {
        $controller->suppCommande($_GET['numCommande']);
    }
    elseif ($_GET['action'] === 'voir' && isset($_GET['numCommande'])) 
    {
        $controller->pageDevis($_GET['numCommande']);
    }
} 
else 
{
    $controller->index();
}
?>