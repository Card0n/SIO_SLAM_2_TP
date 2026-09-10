<?php
require('connexion.php');// Connexion à la base de données

//Requete d'insertion de données 
$stmt = $pdo->prepare("INSERT INTO `commandes`(`quantite`, `dateLivraison`, `statut`, `produit`, `idClient`) VALUES (:quantite, :date_livraison, :statut, :produit, :idClient)");

// Exécution de la requête d'insertion avec les données du formulaire d'ajout de commande
$stmt->execute([
    ":quantite" => $_REQUEST['quantite'],
    ":date_livraison" => $_REQUEST['date_livraison'],
    ":statut" => $_REQUEST['statut'],
    ":produit" => $_REQUEST['produit'],
    ":idClient" => $_REQUEST['client']
]);

// Vérification de l'exécution de la requête
if ($stmt === false) {
    echo "Erreur: L'ajout de la commande a échoué. ";
}
else {
    echo "La commande à bien été ajoutée.";
}
?>
<!-- Bouton retour -->
<button><a href="liste.php">Retour à la liste des commandes -></a></button>