<?php
require_once 'controller/controller.php';

$controller = new Controller();

if ($_SERVER['REQUEST_METHOD'] === 'POST') //Action effectuer selon le formulaire
{
    //Commandes
    if (isset($_POST['action']) && $_POST['action'] === 'ajouterCommande') 
    {
        $controller->ajouterCommande($_POST['date_livraison'], $_POST['statut'], $_POST['produit'], $_POST['client'], $_POST['quantite']);
    }
    elseif (isset($_POST['action']) && $_POST['action'] === 'modifierCommande') 
    {
        $controller->modifierCommande($_POST['numCommande'], $_POST['dateLivraison'], $_POST['statut'], $_POST['produit'], $_POST['idClient'], $_POST['quantite']);
    }

    //Clients
    elseif (isset($_POST['action']) && $_POST['action'] === 'ajouterClient') 
    {
        $controller->ajouterClient($_POST['prenom'], $_POST['nom'], $_POST['telephone'], $_POST['mail'], $_POST['adresse'], $_POST['codePostal']);
    }
    elseif (isset($_POST['action']) && $_POST['action'] === 'modifierClient') 
    {
        $controller->modifierClient($_POST['idClient'], $_POST['prenom'], $_POST['nom'], $_POST['telephone'], $_POST['mail'], $_POST['adresse'], $_POST['codePostal']);
    }

    //Produits
    elseif (isset($_POST['action']) && $_POST['action'] === 'ajouterProduit') 
    {
        $controller->ajouterProduit($_POST['nomProduit'], $_POST['prixUnitaire']);
    }
    elseif (isset($_POST['action']) && $_POST['action'] === 'modifierProduit') 
    {
        $controller->modifierProduit($_POST['idProduit'], $_POST['nomProduit'], $_POST['prixUnitaire']);
    }

    //Statut
    elseif (isset($_POST['action']) && $_POST['action'] === 'ajouterStatut') 
    {
        $controller->ajouterStatut($_POST['nomStatut']);
    }
    elseif (isset($_POST['action']) && $_POST['action'] === 'modifierStatut') 
    {
        $controller->modifierStatut($_POST['idStatut'], $_POST['nomStatut']);
    }
} 
elseif (isset($_GET['action'])) //Action effectuer selon l'URL (donc bouton cliquer)
{
    //Commandes
    if ($_GET['action'] === 'ajouterCommande') 
    {
        $controller->pageAjoutCommande();
    } 
    elseif ($_GET['action'] === 'modifierCommande' && isset($_GET['numCommande'])) 
    {
        $controller->pageModifierCommande($_GET['numCommande']);
    } 
    elseif ($_GET['action'] === 'supprimerCommande' && isset($_GET['numCommande'])) 
    {
        $controller->suppCommande($_GET['numCommande']);
    }
    elseif ($_GET['action'] === 'voir' && isset($_GET['numCommande'])) 
    {
        $controller->pageDevis($_GET['numCommande']);
    }

    //CLients
    elseif ($_GET['action'] === 'listeClients') 
    {
        $controller->listeClients();
    }
    elseif ($_GET['action'] === 'ajouterClient') 
    {
        $controller->pageAjoutClient();
    }
    elseif ($_GET['action'] === 'modifierClient' && isset($_GET['idClient'])) 
    {
        $controller->pageModifierClient($_GET['idClient']);
    }
    elseif ($_GET['action'] === 'supprimerClient' && isset($_GET['idClient'])) 
    {
        $controller->suppClient($_GET['idClient']);
    }

    //Produits
    elseif ($_GET['action'] === 'listeProduits') 
    {
        $controller->listeProduits();
    }
    elseif ($_GET['action'] === 'ajouterProduit') 
    {
        $controller->pageAjoutProduit();
    }
    elseif ($_GET['action'] === 'modifierProduit' && isset($_GET['idProduit'])) 
    {
        $controller->pageModifierProduit($_GET['idProduit']);
    }
    elseif ($_GET['action'] === 'supprimerProduit' && isset($_GET['idProduit'])) 
    {
        $controller->suppProduit($_GET['idProduit']);
    }

    //Statut
    elseif ($_GET['action'] === 'listeStatut') 
    {
        $controller->listeStatut();
    }
    elseif ($_GET['action'] === 'ajouterStatut') 
    {
        $controller->pageAjoutStatut();
    }
    elseif ($_GET['action'] === 'modifierStatut' && isset($_GET['idStatut'])) 
    {
        $controller->pageModifierStatut($_GET['idStatut']);
    }
    elseif ($_GET['action'] === 'supprimerStatut' && isset($_GET['idStatut'])) 
    {
        $controller->suppStatut($_GET['idStatut']);
    }
} 
else 
{
    $controller->index();
}
?>